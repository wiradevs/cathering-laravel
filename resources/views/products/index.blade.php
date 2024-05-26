@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Menu</strong></div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'products', 'method'=>'get', 'class'=>'form-inline']) !!}
                    <div class="form-group {!! $errors->has('q') ? 'has-error' :'' !!}">
                    {!! Form::text('q', isset($q) ? $q :null, ['class'=>'form-control', 'placeholder'=>'Ketik Nama', 'autocomplete'=>'off']) !!}
                    {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                    </div>
                    {!! Form::submit('Cari',['class'=>'btn btn-primary'] ) !!}
                    <a href="{{route('products.create') }}" class="btn btn-success">New Menu</a>
                    {!! Form::close() !!}

                    <table class="table table-striped">
                        <thead bgcolor="#CFFAB7">
                            <tr>
                                <td>Mark</td>
                                <td>Nama</td>
                                <td>Kategori</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                            <td><input type="checkbox" name="checkbox[]" data-id="checkbox"class="cb" value="{{$product->id}}" /></td>
                                <td>{{ $product->name}}</td>
                                <td>
                                    @foreach($product->categories as $category)
                                    <span class="label label-warning">
                                    <i class="fas fa-btn fa-utensil-spoon animated infinite swing slower delay-5s"></i>
                                    {{$category->title}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-info" onclick="location.href='{{route('products.edit', $product->id)}}'">Edit</button>
                                    {!! Form::model($product, ['route'=>['products.destroy', $product], 'method'=>'delete', 'class'=>'form-inline']) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$products->appends(compact('q'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
