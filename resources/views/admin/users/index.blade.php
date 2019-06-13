@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach ($users as $user)

                <tr>
                <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/600x400'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    @if ($user->is_active == 1)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    @if ($user->created_at == null)
                        <td>{{$user->created_at}}</td>
                    @else
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    @endif
                    @if ($user->updated_at == null)
                        <td>{{$user->updated_at}}</td>
                    @else
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
    </div>

    </body>
    </html>

    @endsection