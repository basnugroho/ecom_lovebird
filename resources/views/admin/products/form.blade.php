<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Gambar', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Harga', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('weight', 'Berat (gram)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('weight', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    {!! Form::label('stock', 'Stok', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('stock', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Kategori', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category_id', [''=>'Choose Category']+$categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Deskripsi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambahkan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
