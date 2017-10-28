@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Akun</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Beranda</a>
                    </li>
                    <li>Akun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content" class="clearfix">

    <div class="container">

        <div class="row">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-md-9 clearfix" id="customer-account">

                <!-- <p class="lead">Change your personal details or your password here.</p>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <div class="box">

                    <div class="heading">
                        <h3 class="text-uppercase">Change password</h3>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_old">Old password</label>
                                    <input type="password" class="form-control" id="password_old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_1">New password</label>
                                    <input type="password" class="form-control" id="password_1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_2">Retype new password</label>
                                    <input type="password" class="form-control" id="password_2">
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Save new password</button>
                        </div>
                    </form>

                </div> -->
                <!-- /.box -->


                <div class="box clearfix">
                    <div class="heading">
                        <h3 class="text-uppercase">Data Diri</h3>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Nama</label>
                                    <input type="text" class="form-control" name="firstname" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $address->phone }}">
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->

                        <div class="row">

                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email_account">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="street">Jalan</label>
                                    <input type="text" class="form-control" name="street" value="{{ $address->street }}">
                                </div>
                            </div>


                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Simpan</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

        @include('customers.includes.customer_menu')

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop