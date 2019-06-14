@extends('layouts.admin')

@section('content')

    <h1>Add new user</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
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
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('confirm_password', 'Confirm password:') !!}
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
            {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'],  0, ['class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('photo_id', 'Upload photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Form::submit('Add User', ['class'=>'btn btn-primary pull-right']) !!}
        </div>
    </div>



    {!! Form::close() !!}

    <div class="form-row">
        <div class="form-group col-md-12">
            @include('includes.error')
        </div>
    </div>

    @stop