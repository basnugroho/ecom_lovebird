<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="status" class="form-control">
        @foreach($arrstatus as $stat=>$key)
            @if($key==$status)
            <option value="{{$key}}" selected>{{$key}}</option>
            @else
            <option value="{{$key}}">{{$key}}</option>
            @endif
        @endforeach
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
