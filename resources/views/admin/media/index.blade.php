@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if(Session::has('deleted_photo'))

      <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

    @if(Session::has('added_photo'))

      <p class="bg-success">{{session('added_photo')}}</p>

    @endif

@if($photos)

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
        @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->file}}" alt=""></td>
            @if ($photo->created_at == null)
              <td>{{$photo->created_at}}</td>
            @else
              <td>{{$photo->created_at->diffForHumans()}}</td>
              @endif
            <td>
              {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id]]) !!}

              <div class="form-group">
                  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
              </div>

              {!! Form::close() !!}
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    @endif

    <div class="row">
        <div class="form-group col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>

    @stop