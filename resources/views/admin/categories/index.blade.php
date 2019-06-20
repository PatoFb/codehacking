@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    @if(Session::has('deleted_category'))

        <p class="bg-danger">{{session('deleted_category')}}</p>

    @endif

    @if(Session::has('updated_category'))

        <p class="bg-warning">{{session('updated_category')}}</p>

    @endif

    @if(Session::has('added_category'))

        <p class="bg-success">{{session('added_category')}}</p>

    @endif

    <div class="form-row">
        <div class="form-group col-md-12">
            @include('includes.error')
        </div>
    </div>

    <div class="form row">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group col-md-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-12">
            {!! Form::submit('Create category', ['class'=>'btn btn-primary pull-right']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="form row">
        @if($categories)
            <div class="container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            @if ($category->created_at == null)
                                <td>{{$category->created_at}}</td>
                            @else
                                <td>{{$category->created_at->diffForHumans()}}</td>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                @endif
            </div>

    </div>

    <div class="row">
        <div class="form-group col-sm-offset-5">
            {{$categories->render()}}
        </div>
    </div>
    @stop