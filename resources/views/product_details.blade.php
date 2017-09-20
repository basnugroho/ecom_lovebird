@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1>{{ $product->name }}</h1>
        </div>
        <div class="col-md-5">
            <ul class="breadcrumb">
                <li><a href="{{ route('front') }}">Home</a>
                </li>
                <li><a href="{{ route('front.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                </li>
                <li><a href="">{{ $product->name }}</a>
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

        <div class="col-md-9">

            <p class="lead">{{ $product->description }}
            </p>
            <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll ke bawah untuk melihat detail produk</a>
            </p>

            <div class="row" id="productMain">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <img src="{{ asset( $product->image ) }}" alt="" class="img-responsive">
                    </div>

                    <!-- <div class="ribbon sale">
                        <div class="theribbon">SALE</div>
                        <div class="ribbon-background"></div>
                    </div>


                    <div class="ribbon new">
                        <div class="theribbon">NEW</div>
                        <div class="ribbon-background"></div>
                    </div> -->
                    

                </div>
                <div class="col-sm-6">
                    <div class="box">

                        <form>
                            <!-- <div class="sizes">

                                <h3>Available sizes</h3>

                                <label for="size_s">
                                    <a href="#">S</a>
                                    <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                </label>
                                <label for="size_m">
                                    <a href="#">M</a>
                                    <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                </label>
                                <label for="size_l">
                                    <a href="#">L</a>
                                    <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                </label>

                            </div> -->

                            <p class="price">IDR {{ $product->price }}</p>

                            <p class="text-center">
                                <!-- <button type="submit" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                </button> -->
                                <form action="{{ route('cart.add') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </form>
                            </p>

                        </form>
                    </div>

                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                            <a href="img/detailbig1.jpg" class="thumb">
                                <img src="{{ asset('universal/img/detailsquare.jpg') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="img/detailbig2.jpg" class="thumb">
                                <img src="{{ asset('universal/img/detailsquare2.jpg') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="img/detailbig3.jpg" class="thumb">
                                <img src="{{ asset('universal/img/detailsquare3.jpg') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="box" id="details">
                <p>
                    <h4>DETAIL PRODUK</h4>
                    <p>{{ $product->description }}</p>
                    <!-- <h4>Material & care</h4>
                    <ul>
                        <li>Polyester</li>
                        <li>Machine wash</li>
                    </ul>
                    <h4>Size & Fit</h4>
                    <ul>
                        <li>Regular fit</li>
                        <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                    </ul>

                    <blockquote>
                        <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                        </p>
                    </blockquote> -->
            </div>

            <div class="box social" id="product-social">
                <h4>Show it to your friends</h4>
                <p>
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </p>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="box text-uppercase">
                        <h3>Mungkin anda tertarik dengan produk berikut</h3>
                    </div>
                </div>
                @foreach($category->products->take(3) as $similiar_product)
                <div class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="image">
                            <a href="#">
                                <img src="{{ asset($product->image) }}" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3>{{ $similiar_product->name }}</h3>
                            <p class="price">IDR {{ $similiar_product->price }}</p>

                        </div>
                    </div>
                    <!-- /.product -->
                </div>
                @endforeach
            </div>

            

        </div>
        <!-- /.col-md-9 -->


        <!-- *** LEFT COLUMN END *** -->

        <!-- *** RIGHT COLUMN ***
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
                        @foreach($categories as $cat)
                        <li class="{{ $cat->id == $product->category->id ? 'active' : '' }}">
                            <a href="{{ route('front.category', ['id' => $category->id ]) }}">{{ $cat->name }} <span class="badge pull-right">{{ count($cat->products) }}</span></a>
                            <ul>
                                @foreach($cat->products as $prod)
                                <li style= 'background-color: {{ $prod->id == $product->id ?   "#eeeeee" : '' }} ;'>
                                    <a href="{{ route('front.detail', ['c_id' => $cat->id, 'p_id' => $prod->id ]) }}">{{ $prod->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endforeach
                        </li>

                    </ul>

                </div>
            </div>

            <div class="panel panel-default sidebar-menu">

                <!-- <div class="panel-heading">
                    <h3 class="panel-title">Brands</h3>
                    <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                </div>

                <div class="panel-body">

                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Armani (10)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Versace (12)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Carlo Bruni (15)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Jack Honey (14)
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                    </form>

                </div> -->
            </div>

            <div class="panel panel-default sidebar-menu">

                <!-- <div class="panel-heading">
                    <h3 class="panel-title clearfix">Colours</h3>
                    <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                </div>

                <div class="panel-body">

                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="colour white"></span> White (14)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="colour green"></span> Green (20)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="colour red"></span> Red (10)
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                    </form>

                </div> -->
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

        <!-- *** RIGHT COLUMN END *** -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
</div>
<!-- /#content -->

@stop