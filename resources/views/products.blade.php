@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>B.M.W Master</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('front') }}">Home</a>
                    </li>
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

            <div class="col-sm-3">

                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('front.category', ['id' => $category->id ]) }}">{{ $category->name }}<span class="badge pull-right">{{ count($category->products)}}</span></a>
                                <ul>
                                    @foreach($category->products as $product)
                                    <li>
                                        <a href="{{ route('front.detail', ['c_id' => $category->id, 'p_id' => $product->id ]) }}">{{ $product->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
                    <a href="shop-category.html">
                        <img src="{{ asset('universal/img/banner.jpg') }}" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
                <!-- /.banner -->

            </div>
            <!-- /.col-md-3 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

            <div class="col-sm-9">

                <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>

                <div class="row products">
                    @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <div class="image">
                                <a href="shop-detail.html">
                                    <img src="{{ asset($product->image) }}" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <!-- /.image -->
                            <div class="text">
                                <h3><a href="shop-detail.html">{{ $product->name }}</a></h3>
                                <p class="price">IDR {{ $product->price }}</p>
                                <p class="text">
                                    <a href="{{ route('front.detail', ['c_id' => $category->id, 'p_id' => $product->id ]) }}" class="btn btn-default">Detail</a>
                                    <form action="{{ route('cart.add') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </form>
                                </p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    @endforeach
                    <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->

                <div class="row">

                    <div class="col-md-12 banner">
                        <a href="#">
                            <img src="{{ asset('img/banner2.jpg') }}" alt="" class="img-responsive">
                        </a>
                    </div>

                </div>


                <div class="pages">

                    <p class="loadMore">
                        <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
                    </p>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->

            <!-- *** RIGHT COLUMN END *** -->

        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop