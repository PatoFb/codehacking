@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

        @endif

    @if(Session::has('updated_user'))

        <p class="bg-warning">{{session('updated_user')}}</p>

    @endif

    @if(Session::has('added_user'))

        <p class="bg-success">{{session('added_user')}}</p>

    @endif

    <h1>Users</h1>


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
              <th>Last updated</th>
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
                    <td>{{$user->role ? $user->role->name : 'Unassigned'}}</td>
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

    <div class="row">
        <div class="form-group col-sm-offset-5">
            {{$users->render()}}
        </div>
    </div>

    @endsection