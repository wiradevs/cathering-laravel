@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Edit {{$product->litle}}</strong></div>
                <div class="panel-body">
                    {!! Form::model($product, ['route'=>['products.update', $product], 'method'=>'patch', 'files'=>true]) !!}
                    @include('products._form', ['model'=> $product])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
