@extends('layouts.front')
@section('content')
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="customer-orders.html" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email_modal" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_modal" placeholder="password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>

                </form>

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>

<!-- *** LOGIN MODAL END *** -->

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Order # 1735</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="customer-orders.html">My orders</a>
                    </li>
                    <li>Order # 1735</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="content">
    <div class="container">

        <div class="row">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-md-9 clearfix" id="customer-order">

                <p class="lead">Pesanan #{{ $orders->id }} tercatat pada tanggal <strong>{{ $orders->created_at}}</strong> status saat ini <strong>{{ $orders->status }}</strong>.</p>
                <p class="lead text-muted">Jika anda membutuhkan bantuan, silahkan <a href="{{ route('contact')}}">hubungi kami</a>, kami siap membantu anda.</p>

                <div class="box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders->products as $order)
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                        </a>
                                    </td>
                                    <td><a href="#"></a>
                                    </td>
                                    <td>{{ $order->pivot->quantity}}</td>
                                    <td>{{ $order->pivot->selling_price}}</td>
                                    <td>{{ $order->pivot->selling_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Subtotal</th>
                                    <th>{{ $orders->total * 1000 }}</th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Ongkos Kirim</th>
                                    <th>{{ $orders->delivery_cost }}</th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Total</th>
                                    <th><?php $a = $orders->total * 1000 + $orders->delivery_cost; echo $a;?></th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    @if($orders->delivery_method != 'take away')
                    <div class="row addresses">
                        <div class="col-sm-6">
                            <!-- <h3 class="text-uppercase">Invoice address</h3>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p> -->
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-uppercase">Alamat Kirim</h3>
                            <p>{{ $user->name}}
                                <br>{{ $user->address->street }}
                                <br>{{ $user->address->city }} {{ $user->address->state }}
                                <br>{{ $user->address->zip }}
                                <br>{{ $user->address->country }}
                                <br>{{ $user->address->phone }}</p>
                        </div>
                    </div>
                    @endif
                    <!-- /.addresses -->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

            @include('customers.includes.customer_menu')

            <!-- *** RIGHT COLUMN END *** -->

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<!-- *** GET IT ***
_________________________________________________________ -->
@stop