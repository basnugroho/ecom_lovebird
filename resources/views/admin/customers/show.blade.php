@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">customer {{ $customer->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/customers') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/customers/' . $customer->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/customers', $customer->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete customer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $customer->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $customer->name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $customer->email }} </td></tr>
                                    <tr><th> Member Sejak </th><td> {{ $customer->created_at->diffForHumans() }} </td></tr>
                                    <tr><th> Alamat: </th><td>  </td></tr>
                                    <tr><th> Jalan </th><td>{{ $address->street}}</td></tr>
                                    <tr><th> Kabupaten/Kota </th><td>{{ $address->city}}</td></tr>
                                    <tr><th> Kodepos </th><td>{{ $address->zip}}</td></tr>
                                    <tr><th> Negara </th><td>{{ $address->country}}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
