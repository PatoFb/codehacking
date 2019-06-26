@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')

    <h1>Create new post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

    <div class="form-row">


        <div class="form-group col-md-12">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>


        <div class="form-group col-md-12">
        {!! Form::label('body', 'Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5]) !!}
    </div>


        <div class="form-group col-md-12">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', [''=>'Select category'] + $categories, null, ['class'=>'form-control']) !!}
    </div>


        <div class="form-group col-md-12">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    </div>
        <div class="form-row">
        <div class="form-group col-md-12">
        {!! Form::submit('Create post', ['class'=>'btn btn-primary pull-right']) !!}

    </div>
    </div>

    {!! Form::close() !!}


    <div class="form-row">
        <div class="form-group col-md-12">
        @include('includes.error')
    </div>
    </div>




@stop