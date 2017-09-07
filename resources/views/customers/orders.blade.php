@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>My orders</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="index.html">Home</a>
                    </li>
                    <li>My orders</li>
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

            <div class="col-md-9" id="customer-orders">

                <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <div class="box">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th># 1735</th>
                                    <td>22/06/2013</td>
                                    <td>$ 150.00</td>
                                    <td><span class="label label-info">Being prepared</span>
                                    </td>
                                    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th># 1735</th>
                                    <td>22/06/2013</td>
                                    <td>$ 150.00</td>
                                    <td><span class="label label-info">Being prepared</span>
                                    </td>
                                    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th># 1735</th>
                                    <td>22/06/2013</td>
                                    <td>$ 150.00</td>
                                    <td><span class="label label-success">Received</span>
                                    </td>
                                    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th># 1735</th>
                                    <td>22/06/2013</td>
                                    <td>$ 150.00</td>
                                    <td><span class="label label-danger">Cancelled</span>
                                    </td>
                                    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th># 1735</th>
                                    <td>22/06/2013</td>
                                    <td>$ 150.00</td>
                                    <td><span class="label label-warning">On hold</span>
                                    </td>
                                    <td><a href="customer-order.html" class="btn btn-template-main btn-sm">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

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


    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<!-- *** GET IT ***
_________________________________________________________ -->
@stop