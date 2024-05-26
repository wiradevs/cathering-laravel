@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Categories</strong></div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'categories', 'method'=>'get', 'class'=>'form-inline']) !!}
                        <div class="form-group {!! $errors->has('q') ? 'has-error':'' !!}">
                            {!! Form::text('q', isset($q)? $q : null, ['class'=>'form-control', 'placeholder'=>'Nama Kategori', 'autocomplete'=>'off']) !!}
                            {!! $errors->first('q', '<p class="help-block">:massage</p>') !!}
                        </div>
                    {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
                    <a href="{{route('categories.create')}}" class="btn btn-success">New Category</a>
                    {!! Form::close() !!}
                    <table class="table table-striped">
                        <thead bgcolor="#CFFAB7">
                            <tr>
                                <td>Judul</td>
                                <td>Relasi</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                <td>{{$category->parent ? $category->parent->title : ''}}</td>
                                <td>
                                    {!! Form::model($category, ['route'=>['categories.destroy', $category], 'method'=>'delete', 'class'=>'form-inline']) !!}
                                    <button type="button" class="btn btn-xs btn-info" onclick="location.href='{{route('categories.edit', $category->id)}}'">Edit</button>
                                    {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->appends(compact('q'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
