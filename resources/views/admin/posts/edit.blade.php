@extends('layouts.admin')

@section('content')


    <h1>Edit post</h1>

    <div class="form-group col-sm-6">
        <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="form-group col-sm-6">
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

    <div class="form-row">

        <div class="form-group col-md-12">
            {!! Form::label('user_id', 'Select owner:') !!}
            {!! Form::select('user_id', [''=>'Select owner'] + $users, null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group col-md-12">
            {!! Form::label('title', 'Edit title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group col-md-12">
            {!! Form::label('body', 'Edit content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5]) !!}
        </div>


        <div class="form-group col-md-12">
            {!! Form::label('category_id', 'Select category:') !!}
            {!! Form::select('category_id', [''=>'Select category'] + $categories, null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group col-md-12">
            {!! Form::label('photo_id', 'New photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
    </div>

        <div class="form-row">
        <div class="form-group col-md-10">
            {!! Form::submit('Accept changes', ['class'=>'btn btn-primary pull-right']) !!}

        </div>
    </div>

    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

        <div class="form-group col-md-2">
            {!! Form::submit('Delete post', ['class'=>'btn btn-danger']) !!}
        </div>


    {!! Form::close() !!}

    </div>


    <div class="form-row">
        <div class="form-group col-md-12">
            @include('includes.error')
        </div>
    </div>




@stop