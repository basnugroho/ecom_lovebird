@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Checkout - Delivery method</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Checkout - Delivery method</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">

            <div class="col-md-9 clearfix" id="checkout">

                <div class="box">
                    <form method="post" action="{{ route('checkout.address') }}">
                        {{ csrf_field() }}
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Pengiriman</a>
                            </li>
                            <li><a href="shop-checkout1.html"><i class="fa fa-map-marker"></i><br>Alamat</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Pembayaran</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Review Pesanan</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>Ambil di Tempat</h4>

                                        <p>Barang Diambil di lokasi distributor.</p>

                                        <div class="box-footer text-center">
                                            <input type="radio" name="delivery" value="take">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box shipping-method">
                                        <h4>JNE</h4>
                                        <p>Menggunakan JNE.</p>
                                        <div class="box-footer text-center">
                                            <input type="radio" name="delivery" value="jne">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Cart</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Lanjut<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <th>$446.00</th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>$10.00</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>$0.00</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>$456.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop