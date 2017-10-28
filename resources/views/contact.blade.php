@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Kontak</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="{{ route('front') }}">Beranda</a>
                    </li>
                    <li>Kontak</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container" id="contact">
        <section>
            <div class="row">
                <div class="col-md-12">
                    <section>
                        <div class="heading">
                            <h2>Kami siap membantu anda</h2>
                        </div>
                        <p class="lead">Apakah anda merasa bingung? Apakah anda memiliki pertanyaan mengenai produk kami?</p>
                        <p>Silahkan hubungi kami kapanpun, kami siap membantu anda.</p>
                    </section>
                </div>
            </div>

        </section>

        <section>

            <div class="row">
                <div class="col-md-4">
                    <div class="box-simple">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3>Alamat</h3>
                        <p>Jl. Bukit Palma C3/33 Citraland
                            <br>Surabaya, Jawa Timur
                            <br>60292, <strong>Indonesia</strong>
                        </p>
                    </div>
                    <!-- /.box-simple -->
                </div>


                <div class="col-md-4">

                    <div class="box-simple">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <h3>Telepon</h3>
                        <p class="text-muted">Nomor ini dapat dihubungi melalui cellular dan whatsapp</p>
                        <p><strong>+33 555 444 333</strong>
                        </p>
                    </div>
                    <!-- /.box-simple -->

                </div>

                <div class="col-md-4">

                    <div class="box-simple">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p class="text-muted">Silahkan tulis email kepada kami.</p>
                        <ul class="list-style-none">
                            <li><strong><a href="mailto:">admin@bmwmastesby.com</a></strong>
                            </li>
                            <!-- <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li> -->
                        </ul>
                    </div>
                    <!-- /.box-simple -->
                </div>
            </div>

        </section>

        <section>

            <div class="row text-center">

                <div class="col-md-12">
                    <div class="heading">
                        <h2>Form Kontak</h2>
                    </div>
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telepon (opsional)</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="subject">Topik</label>
                                    <input type="text" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Pesan</label>
                                    <textarea id="message" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Kirim Pesan</button>
                            </div>
                        </div>
                        <!-- /.row -->
                    </form>



                </div>
            </div>
            <!-- /.row -->

        </section>


    </div>
    <!-- /#contact.container -->
</div>
<!-- /#content -->

<div id="map">

</div>
@stop