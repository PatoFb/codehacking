@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="form row">
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group col-md-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>
        <div class="form row">
        <div class="form-group col-md-10">
            {!! Form::submit('Accept changes', ['class'=>'btn btn-primary pull-right']) !!}
        </div>

        {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class=" form-group col-md-2">
        {!! Form::submit('Delete category', ['class'=>'btn btn-danger']) !!}
            </div>
            </div>

    {!! Form::close() !!}

    <div class="form-row">
        <div class="form-group col-md-12">
            @include('includes.error')
        </div>
    </div>
@stop