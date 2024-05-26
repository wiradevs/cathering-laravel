@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Edit {{ $category->title }}</strong></div>
                <div class="panel-body">
                    {!! Form::model($category, ['route'=> ['categories.update', $category], 'method'=>'patch']) !!}
                    @include('categories._form', ['model'=>$category])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

