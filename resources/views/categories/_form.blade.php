<div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
    {!! Form::label('title', 'Judul') !!}
    {!! Form::text('title', null, ['class'=>'form-control', 'autocomplete'=>'off']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
    {!! Form::label('parent_id', 'Relasi') !!}
    {!! Form::select('parent_id', [''=>'']+App\Category::lists('title','id')->all(), null, ['class'=>'form-control']) !!}
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
