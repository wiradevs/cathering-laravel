<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name',null, ['class'=>'form-control', 'autocomplete'=>'off']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null, ['class'=>'form-control', 'autocomplete'=>'off']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
    {!! Form::label('category_lists', 'Categories') !!}
    {!! Form::select('category_lists[]', [''=>'']+App\Category::lists(  'title','id')->all(), null, ['class'=>'form-control js-selectize','multiple']) !!}
    {!!  $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('photo') ? 'has-error' :'' !!}">
    {!! Form::label('photo', 'Menu picture (jpeg, png, jpg)') !!}
    {!! Form::file('photo') !!}
    {!!  $errors->first('photo', '<p class="help-block">:message</p>') !!}

@if(isset($model) && $model->photo !== '')
<div class="row">
    <div class="col-sm-6">
        <p>Current Picture :</p>
        <div class="thumbnail">
            <img src="{{ url('/img/' . $model->photo) }}" class="img-rounded">
        </div>
    </div>
</div>
@endif
</div>
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
