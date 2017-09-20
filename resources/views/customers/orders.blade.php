@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>My orders</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Home</a>
                    </li>
                    <li>My orders</li>
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

            <div class="col-md-9" id="customer-orders">

                <p class="text-muted lead">Jika anda membutuhkan bantuan, silahkan hubungi <a href="{{ route('contact') }}">Hubungi kami</a>, kami akan bantu anda.</p>

                <div class="box">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <th># {{ $order->id }}</th>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        @if($order->status == 'not paid')
                                        <span class="label label-warning">belum dibayar</span>
                                        @elseif($order->status == 'paid')
                                        <span class="label label-info">lunas</span>
                                        @elseif($order->status == 'ready to take')
                                        <span class="label label-info">siap diambil</span>
                                        @elseif($order->status == 'sending')
                                        <span class="label label-info">siap diambil</span>
                                        @elseif($order->status == 'done')
                                        <span class="label label-success">selesai</span>
                                        @elseif($order->status == 'cancel')
                                        <span class="label label-danger">batal</span>
                                        @else
                                        <span class="label label-warning">kasus khusus</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('order.details', ['id' => $order->id ]) }}" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->


        @include('customers.includes.customer_menu')

        </div>


    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<!-- *** GET IT ***
_________________________________________________________ -->
@stop