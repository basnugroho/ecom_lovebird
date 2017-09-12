@extends('layouts.front')
@section('content')
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="customer-orders.html" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email_modal" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_modal" placeholder="password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>

                </form>

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>

<!-- *** LOGIN MODAL END *** -->

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Order # 1735</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="customer-orders.html">My orders</a>
                    </li>
                    <li>Order # 1735</li>
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

            <div class="col-md-9 clearfix" id="customer-order">

                <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
                <p class="lead text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <div class="box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                        </a>
                                    </td>
                                    <td><a href="#">White Blouse Armani</a>
                                    </td>
                                    <td>2</td>
                                    <td>$123.00</td>
                                    <td>$0.00</td>
                                    <td>$246.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="img/basketsquare.jpg" alt="Black Blouse Armani">
                                        </a>
                                    </td>
                                    <td><a href="#">Black Blouse Armani</a>
                                    </td>
                                    <td>1</td>
                                    <td>$200.00</td>
                                    <td>$0.00</td>
                                    <td>$200.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-right">Order subtotal</th>
                                    <th>$446.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Shipping and handling</th>
                                    <th>$10.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Tax</th>
                                    <th>$0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Total</th>
                                    <th>$456.00</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="row addresses">
                        <div class="col-sm-6">
                            <h3 class="text-uppercase">Invoice address</h3>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-uppercase">Shipping address</h3>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                    </div>
                    <!-- /.addresses -->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li>
                                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                            </li>
                            <li>
                                <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <!-- *** RIGHT COLUMN END *** -->

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<!-- *** GET IT ***
_________________________________________________________ -->
@stop