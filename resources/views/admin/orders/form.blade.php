<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('delivery_method') ? 'has-error' : ''}}">
    {!! Form::label('delivery_method', 'Delivery Method', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('delivery_method', ['take_away', 'jne'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('delivery_method', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('delivery_service') ? 'has-error' : ''}}">
    {!! Form::label('delivery_service', 'Delivery Service', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('delivery_service', ['none', 'ons', 'reg', 'yes'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('delivery_service', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('delivery_cost') ? 'has-error' : ''}}">
    {!! Form::label('delivery_cost', 'Delivery Cost', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('delivery_cost', null, ['class' => 'form-control']) !!}
        {!! $errors->first('delivery_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    {!! Form::label('total', 'Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('total', null, ['class' => 'form-control']) !!}
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('payment_method') ? 'has-error' : ''}}">
    {!! Form::label('payment_method', 'Payment Method', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('payment_method', ['cash', 'transfer'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('status', ['not_paid', 'paid', 'ready_to_take', 'sending', 'done'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
