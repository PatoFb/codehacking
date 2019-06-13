@extends('layouts.admin')

@section('content')

    <h1>Edit user</h1>

    <div class="form-group col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="form-group col-sm-9">
    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('password', 'New password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('confirm_password', 'Confirm new password:') !!}
            {!! Form::password('confirm_password', ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            {!! Form::label('role_id', 'Role:' )  !!}
            {!! Form::select('role_id', [''=>'Select role'] + $roles, null, ['class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::label('is_active', 'Status:' )  !!}
            {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'],  null, ['class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('photo_id', 'Upload new photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Form::submit('Accept changes', ['class'=>'btn btn-primary pull-right']) !!}
        </div>
    </div>

        {!! Form::close() !!}
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            @include('includes.error')
        </div>
    </div>

@stop