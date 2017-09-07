@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Portfolio item detail</h1>
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
                    <h2>Brief introduction</h2>
                </div>

                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                    mi vitae est. Mauris placerat eleifend leo.</p>
            </div>
        </div>
        <div class="row portfolio-project">

            <section>

                <div class="col-sm-8">
                    <div class="project owl-carousel">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /.project owl-slider -->

                </div>

                <div class="col-sm-4">
                    <div class="project-more">
                        <h4>Client</h4>
                        <p>Pietro Filippi</p>
                        <h4>Services</h4>
                        <p>Consulting, Webdesign, Print</p>
                        <h4>Technologies</h4>
                        <p>PHP, HipHop, Break-dance</p>
                        <h4>Dates</h4>
                        <p>10/2013 - 06/2014</p>
                    </div>
                </div>

            </section>

            <section>

                <div class="col-sm-12">

                    <div class="heading">
                        <h3>Project description</h3>
                    </div>

                    <p>Bringing unlocked me an striking ye perceive. Mr by wound hours oh happy. Me in resolution pianoforte continuing we. Most my no spot felt by no. He he in forfeited furniture sweetness he arranging. Me tedious so to behaved
                        written account ferrars moments. Too objection for elsewhere her preferred allowance her. Marianne shutters mr steepest to me. Up mr ignorant produced distance although is sociable blessing. Ham whom call all lain like.</p>

                    <p>To sorry world an at do spoil along. Incommode he depending do frankness remainder to. Edward day almost active him friend thirty piqued. People as period twenty my extent as. Set was better abroad ham plenty secure had horses.
                        Admiration has sir decisively excellence say everything inhabiting acceptance. Sooner settle add put you sudden him.</p>
                </div>
            </section>

        </div>

        <section>
            <div class="row portfolio">

                <div class="col-md-12">
                    <div class="heading">
                        <h3>Related projects</h3>
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