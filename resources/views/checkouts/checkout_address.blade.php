@extends('layouts.front')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Checkout - Alamat Kirim</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Beranda</a>
                    </li>
                    <li>Checkout - Alamat Kirim</li>
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
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telepon</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->address->phone }}" required>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Negara</label>
                                        <select class="form-control" name="country" value="{{ $user->address->country }}" required readonly>
                                            <option value="1">Indonesia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">Provinsi</label>
                                        <select class="form-control" id="state" name="state" value="{{ $user->address->state }}" required>
                                            <option value="">Silahkan Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">Kota</label>
                                        <select class="form-control" id="city" name="city" value="{{ $user->address->city }}" required>
                                            <option>Silahkan Pilih Provinsi Dahulu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip" value="{{ $user->address->zip }}" name="zip">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Jalan</label>
                                        <input type="text" class="form-control" name="street" value="{{ $user->address->street }}" required>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="courier">Kurir</label>
                                        <select class="form-control" id="courier" name="delivery_method" required readonly>
                                            <!-- <option value="">Silahkan Pilih</option> -->
                                            <option {{ $delivery_method == "jne" ? 'selected' : '' }} value="jne">JNE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group layanan">
                                        <label for="delivery">Jenis Layanan</label>
                                        <select class="form-control" id="service" name="service" required>
                                            <option>Silahkan Pilih Layanan</option>
                                        </select>
                                        <input type="text" name="ongkir" id="ongkir" value="" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="berat_total" id="berat_total" value="{{ $berat_total }}" readonly>
                                <input type="hidden" name="biaya_kirim" id="ongkir" value="">
                                <input type="hidden" name="ongkir_total" id="ongkir_total" value="">
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
            @include('includes.order_summary')
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
                //alert(data);	                
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
                    
                    if(cost) {
                        var ongkir = $('input#ongkir').val(cost+'/Kg');
                        var berat_total = $('#berat_total').val();
                        var subtotal=parseInt($('input#subtotalSummary').val());
                        var ongkir_total=0;
                        if(berat_total < 1000) {
                            ongkir_total = cost;
                            subtotal+=cost;
                        } else {
                            ongkir_total = cost*Math.round(berat_total/1000);
                            subtotal+=ongkir_total;
                        }
                        $('#berat_total').val(berat_total);
                        $('#ongkir_total').val(ongkir_total);
                        $('#ongkirSummary').html("Rp"+new Intl.NumberFormat(['ban', 'id']).format(ongkir_total)+",00");
                        $("#totalSummary").html("Rp"+new Intl.NumberFormat(['ban', 'id']).format(subtotal)+",00");
                    }
                    else {
                        var ongkir = $('input#ongkir').val("error, ongkir tidak tersedia");
                        console.log(ongkir);
                    }
                }
            });
        });


    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }   
</script>
@stop