@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">order #{{ $order->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/orders') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/orders/' . $order->id . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/orders', $order->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete order',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Status </th><td> {{ $order->status }} </td></tr>
                                    <tr><th> User Id </th><td> {{ $order->user_id }} </td></tr>
                                    <tr><th> Name </th><td> {{ $order->user->name }} </td></tr>
                                    <tr><th> Delivery Method </th><td> {{ $order->delivery_method }} </td></tr>
                                    <tr><th> Delivery Service </th><td> {{ $order->delivery_service }} </td></tr>
                                    <tr><th> Delivery Cost </th><td> Rp{{number_format($order->delivery_cost, 2, ",", ".")}} </td></tr>
                                    <tr><th> Weight Total </th><td> {{ $order->weight_total }}Kg </td></tr>
                                    <tr><th> Delivery Cost Total </th><td> Rp{{number_format($order->delivery_cost_total, 2, ",", ".")}} </td></tr>
                                    <tr><th> Shopping Total (without delivery cost) </th><td> Rp{{number_format($order->sub_total, 2, ",", ".")}} </td></tr>
                                    <tr><th> Payment Method </th><td> {{ $order->payment_method }} </td></tr>
                                    <tr><th> Order Time </th><td> {{ $order->created_at->diffForHumans() }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                        <table class="table">
                        <thead>
                        <tr>
                            <th>product id</th>
                            <th>product name</th>
                            <th>selling price</th>
                            <th>quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $orderD)
                        <tr>
                            <td>{{ $orderD->product->id }}</td>
                            <td>{{ $orderD->product->name }}</td>
                            <td>Rp{{ number_format($orderD->selling_price, 2, ",", ".") }} </td>
                            <td>{{ $orderD->quantity }}pc</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Name </th><td> {{ $order->user->name }} </td></tr>
                                    <tr><th> Phone </th><td> {{ $address->phone }} </td></tr>
                                    <tr><th> Street </th><td> {{ $address->street }} </td></tr>
                                    <tr><th> City </th><td> {{ $address->city_type }} {{ $address->city  }} </td></tr>
                                    <tr><th> Zip </th><td> {{ $address->zip }} </td></tr>
                                    <tr><th> Province </th><td> {{ $address->province }} </td></tr>
                                    <tr><th> Nation </th><td> {{ $address->country }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
