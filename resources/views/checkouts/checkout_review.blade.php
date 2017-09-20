@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Checkout - Order review</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Checkout - Order review</li>
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
                    <form method="post" action="{{ route('checkout.pay') }}">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-truck"></i><br>Pengiriman</a>
                            </li>
                            <li><a href=""><i class="fa fa-map-marker"></i><br>Alamat</a>
                            </li>
                            <li><a href=""><i class="fa fa-money"></i><br>Pembayaran</a>
                            </li>
                            <li class="active"><a href="{{ url('checkout/address') }}"><i class="fa fa-eye"></i><br>Review Pesanan</a>
                            </li>
                        </ul>

                        <div class="content">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual (IDR)</th>
                                    <th>Total (tanpa ongkir)</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                                <input type="hidden" name="delivery_method" value='{{ Session::get('delivery_method') }}'>
                                @foreach(Cart::content() as $product)
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="{{ asset($product->model->image) }}" alt="{{ $product->rowId }}">
                                        </a>
                                    </td>
                                    <td>
                                        <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                        <a href="#">{{ $product->name }}</a>
                                    </td>
                                    <td>
                                        <input name="qty[]" class="small" type="hidden" value="{{ $product->qty }}" class="form-control">
                                        {{ $product->qty }}
                                    </td>
                                    <td>
                                        <input type="hidden" name="selling_price[]" value="{{ $product->price }}">
                                        {{ $product->price() }}
                                    </td>
                                    <td>
                                        {{ $product->total() * 1000.00}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <input type="hidden" name="total" value="{{ Cart::total() }}">
                                    <th colspan="1">{{ Cart::total() * 1000}}</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ route('checkout.delivery') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Bayar<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
            @include('includes.order_summary')
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop