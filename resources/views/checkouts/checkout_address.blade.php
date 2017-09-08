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
                            
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Pengiriman</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Pembayaran</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Review Pesanan</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" value="{{ $user->name }}">
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
                                        <input type="text" class="form-control" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Negara</label>
                                        <select class="form-control" id="country">
                                            <option value="1">Indonesia</option>
                                        </select>
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
                                        <select class="form-control" id="city" name="city">
                                            <option>Silahkan Pilih Provinsi Duhulu</option>
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
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="courier">Kurir</label>
                                        <select class="form-control" id="courier" name="courier">
                                            <option value="">Silahkan Pilih</option>
                                            <option {{ $delivery == "jne" ? 'selected' : '' }} value="jne">JNE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group layanan">
                                        <label for="delivery">Layanan</label>
                                        <select class="form-control" id="service" name="service">
                                            <option>Silahkan Pilih Layanan</option>
                                        </select>
                                        <input type="text" name="ongkir" id="ongkir" value="" readonly>
                                    </div>
                                </div>
                                

                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali ke Pengiriman</a>
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

        
        //get cities
        var prov_id = $('#state').val();
        $('#state').change(function () {
            prov_id = $('#state').val();

            //remove city options
            $('#city option').each(function() {
                $(this).remove();
            });


            $.ajax({
                url: "{{ route('ongkir.cities') }}",
                type:'get',
                data: { prov_id: prov_id },
                success: function(data) {	                
                    var json = JSON.parse(data);
                    //console.log(json['rajaongkir']['results'])
                    var cities = json["rajaongkir"]["results"];
                    var i = 0;
                    $('#city').append('<option>Silahkan Pilih Kota</option>');
                        i++;
                    while(i < cities.length) {   
                        $('#city').append('<option value="'+ cities[i]['city_id']  +'">'+cities[i]['type']+" "+cities[i]['city_name'] +'</option>');
                        i++;
                    }
                }
            });
        });

        //get zip
        var city_id = $('#city').val();
        $('#city').change(function () {

            // //remove service
            // $('#service option').each(function() {
            //     $(this).remove();
            // });

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
                    //kosongkan input biaya ongkir
                    var ongkir = $('input#ongkir').val("layanan belum dipilih");
                }
            });

            //get services when city changed
            $.ajax({
                url: "{{ route('ongkir.services') }}",
                type:'get',
                data: { courier: "jne", destination: city_id },
                success: function(data, city_id) {
                    var json = JSON.parse(data);
                    var services = json["rajaongkir"]["results"][0]['costs'];             
                    //console.log(services)
                    var a = 0;
                    while(a < services.length) {
                        //set services
                        $('#service').append('<option value="'+ a +'">'+ services[a]['description'] +" ("+ services[a]['cost'][0]['etd'] +' hari)</option>');
                        a++;
                    }
                }
            });

        });

        //get cost when service changed
        $('#service').change(function () {
            $("#cost").remove()
            var courier = $('#courier').val();
            //var serv_id = $('#service').val();
            $.ajax({
                url: "{{ route('ongkir.services') }}",
                type:'get',
                data: { courier: "jne", destination: city_id },
                success: function(data) {
                    var json = JSON.parse(data);
                    //console.log(data);
                    var service_id = $('#service').val();
                    var cost = json["rajaongkir"]["results"][0]['costs'][service_id]['cost'][0]['value']; //['costs'][id]             
                    console.log(cost);
                    
                    try {
                        var ongkir = $('input#ongkir').val(cost);
                        console.log(ongkir);
                    }
                    catch(err) {
                        var ongkir = $('input#ongkir').val("error, ongkir tidak tersedia");
                        console.log(ongkir);
                    }
                }
            });
        });


    });
</script>
@stop