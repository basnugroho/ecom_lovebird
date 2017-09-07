@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Checkout - Address</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Checkout - Address</li>
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
                    <form method="post" action="{{ route('checkout.payment') }}">
                        {{ csrf_field() }}
                        <ul class="nav nav-pills nav-justified">
                            
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Negara</label>
                                        <select class="form-control" id="country"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">Provinsi</label>
                                        <select class="form-control" id="state">
                                            <option value="">Silahkan Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">Kota</label>
                                        <select class="form-control" id="city">
                                            <option value="">Silahkan Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Jalan</label>
                                        <input type="text" class="form-control" id="street">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telepon</label>
                                        <input type="text" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="delivery">Pengiriman</label>
                                        <input type="delivery" class="form-control" id="delivery" value="{{ $delivery }}" disabled>
                                    </div>
                                </div>
                                

                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="shop-basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Lanjut Pembayaran<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <th>$446.00</th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>$10.00</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>$0.00</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>$456.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@stop
@section('scripts')

<script>
    $(document).ready(function(){
        
        var txt = "";
        //get provinces
        $.ajax({
            url: "{{ route('ongkir.provinces') }}",
            type:'get',
            data: { query: txt },
            success: function(data) {	                
                var json = JSON.parse(data);
                var provinces = json["rajaongkir"]["results"];
                var i = 0;
                while(i < provinces.length) {
                    //console.log(provinces[i]['province_id'] +": "+provinces[i]['province']);
                    $('#state').append('<option value="'+ provinces[i]['province_id']  +'">'+ provinces[i]['province'] +'</option>');
                    i++;
                }
            }
        });

        var prov_id = $('#state').val();
        //get cities
        $('#state').change(function () {
            prov_id = $('#state').val();

            $('#city option').each(function() {
                $(this).remove();
            });
            //console.log(prov_id);

            $.ajax({
                url: "{{ route('ongkir.cities') }}",
                type:'get',
                data: { prov_id: prov_id },
                success: function(data) {	                
                    var json = JSON.parse(data);
                    //console.log(json['rajaongkir']['results'])
                    var cities = json["rajaongkir"]["results"];
                    var i = 0;
                    while(i < cities.length) {
                        //console.log(cities[i]['city_id'] +" "+cities[i]['type']+" "+cities[i]['city_name']);
                        
                        $('#city').append('<option value="'+ cities[i]['city_id']  +'">'+cities[i]['type']+" "+cities[i]['city_name'] +'</option>');
                        i++;
                    }
                }
            });
        });

        //get zip
        $('#city').change(function () {

            prov_id = $('#state').val();
            city_id = $('#city').val();

            $.ajax({
                url: "{{ route('ongkir.cities') }}",
                type:'get',
                data: { prov_id: prov_id, city_id: city_id },
                success: function(data, city_id) {
                    var json = JSON.parse(data);
                    var zip = json["rajaongkir"]["results"]['postal_code'];             
                    //console.log(city_id)
                    $('#zip').val(zip)
                }
            });
        })


    });
</script>
@stop