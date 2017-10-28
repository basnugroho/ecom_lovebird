@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Shopping cart</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="text-muted lead">Saat ini anda memiliki {{ Cart::count() }} item didalam cart.</p>
            </div>


            <div class="col-md-9 clearfix" id="basket">

                <div class="box">

                    <!-- <form method="post" action="shop-checkout1.html"> -->

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Nama Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Berat(gram)</th>
                                        <th>Harga Barang</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('cart.update') }}" action="get">
                                    @foreach(Cart::content() as $product)
 
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="{{ asset($product->model->image) }}" alt="{{ $product->rowId }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">{{ $product->name }}</a>
                                        </td>
                                        <td>
                                            <input type="hidden" name="row_id[]" value="{{ $product->rowId }}">
                                            <input name="qty[]" class="small" type="number" value="{{ $product->qty }}" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="total_berat[]" id="" value="{{ $product->options->weight }}">
                                        </td>
                                        <td>Rp{{ $product->price() }}</td>
                                        <td>Rp{{ $product->total() }}</td>
                                        <td>
                                            <a href="{{ route('cart.delete', ['row_id' => $product->rowId] ) }}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">Rp{{ Cart::total() }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ route('front') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjut belanja</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> perbarui cart</button>
                                </form>
                                <a href="{{ route('checkout.delivery') }}" class="btn btn-template-main">Lanjut checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    

                </div>
                <!-- /.box -->

                <!-- You may also like these products -->
                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="box text-uppercase">
                            <h3>Mungkin anda tertarik dengan produk berikut</h3>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="product">
                            <div class="image">
                                <a href="shop-detail.html">
                                    <img src="{{ asset('universal/img/product2.jpg') }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <div class="text">
                                <h3><a href="shop-detail.html">Fur coat</a></h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="product">
                            <div class="image">
                                <a href="shop-detail.html">
                                    <img src="{{ asset('universal/img/product3.jpg') }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <div class="text">
                                <h3><a href="shop-detail.html">Fur coat</a></h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="product">
                            <div class="image">
                                <a href="shop-detail.html">
                                    <img src="{{ asset('universal/img/product1.jpg') }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <div class="text">
                                <h3><a href="shop-detail.html">Fur coat</a></h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
            <!-- order summary -->
            @include('includes.order_summary')

            <!-- /.col-md-3 -->
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop