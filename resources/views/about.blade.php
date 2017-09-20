@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>TENTANG BMWMASTER</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="portfolio-2.html">Portfolio</a>
                    </li>
                    <li>Portfolio item detail</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Profil</h2>
                </div>

                <p class="lead"><p>Sebagai badan usaha dagang CV. Rajawali Nuansa Indah memiliki produk-produk makanan dan multivitamin untuk segala jenis burung berkicau. <br>
                CV. Rajawali Nuansa Indah menjalankan usahanya melalui distributor-distributornya di Jakarta dan Surabaya.</p>.</p>
            </div>
        </div>
        <div class="row portfolio-project">

            <section>

                <div class="col-sm-8">
                    <div class="project owl-carousel">
                        <div class="item">
                            <img src="{{ asset('uploads/front/spanduk-min.jpg')}}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <!-- /.project owl-slider -->

                </div>

                <div class="col-sm-4">
                    <div class="project-more">
                        <h4>Produk</h4>
                        <p>Pakan Burung</p>
                        <h4>Buka</h4>
                        <p>Senin – Jumat distributor buka mulai jam 08.00 WIB – 17.00 WIB</p>
                        <h4>Merk</h4>
                        <p>BMW MASTER</p>
                        <h4>Berdiri Sejak</h4>
                        <p>2015</p>
                    </div>
                </div>

            </section>

            <section>

                <div class="col-sm-12">

                    <div class="heading">
                        <h3></h3>
                    </div>

                    

                    <p>Untuk distributor di Surabaya, CV. Rajawali Nuansa Indah beralamat di Jl. Bukit Palma C3/33 Citraland Surabaya. 
                        <br>Setiap hari Senin – Jumat distributor buka mulai jam 08.00 WIB – 17.00 WIB. 
                        <br>Melayani pembelian secara langsung dan pengiriman menggunakan JNE.</p>
                </div>
            </section>

        </div>

        <section>
            <div class="row portfolio">

                <div class="col-md-12">
                    <div class="heading">
                        <h3></h3>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="box-image">
                        <div class="image">
                            <img src="img/portfolio-1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="bg"></div>
                        <div class="name">
                            <h3><a href="portfolio-detail.html">Portfolio box-image</a></h3> 
                        </div>
                        <div class="text">
                            <p class="buttons">
                                <a href="portfolio-detail.html" class="btn btn-template-transparent-primary">View</a>
                                <a href="#" class="btn btn-template-transparent-primary">Website</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-image -->

                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="box-image">
                        <div class="image">
                            <img src="img/portfolio-2.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="bg"></div>
                        <div class="name">
                            <h3><a href="portfolio-detail.html">Portfolio box-image</a></h3> 
                        </div>
                        <div class="text">
                            <p class="buttons">
                                <a href="portfolio-detail.html" class="btn btn-template-transparent-primary">View</a>
                                <a href="#" class="btn btn-template-transparent-primary">Website</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-image -->

                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="box-image">
                        <div class="image">
                            <img src="img/portfolio-3.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="bg"></div>
                        <div class="name">
                            <h3><a href="portfolio-detail.html">Portfolio box-image</a></h3> 
                        </div>
                        <div class="text">
                            <p class="buttons">
                                <a href="portfolio-detail.html" class="btn btn-template-transparent-primary">View</a>
                                <a href="#" class="btn btn-template-transparent-primary">Website</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-image -->

                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="box-image">
                        <div class="image">
                            <img src="img/portfolio-4.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="bg"></div>
                        <div class="name">
                            <h3><a href="portfolio-detail.html">Portfolio box-image</a></h3> 
                        </div>
                        <div class="text">
                            <p class="buttons">
                                <a href="portfolio-detail.html" class="btn btn-template-transparent-primary">View</a>
                                <a href="#" class="btn btn-template-transparent-primary">Website</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-image -->
                </div>

            </div>
        </section>

    </div>
    <!-- /.container -->


</div>
<!-- /#content -->
@stop