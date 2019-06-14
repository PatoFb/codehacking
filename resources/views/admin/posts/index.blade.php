@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    @if(Session::has('updated_post'))

        <p class="bg-warning">{{session('updated_post')}}</p>

    @endif

    @if(Session::has('added_post'))

        <p class="bg-success">{{session('added_post')}}</p>

    @endif


    <h1>Posts</h1>

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
              <th>Owner</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created</th>
              <th>Last Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)

          <tr>
            <td>{{$post->id}}</td>
              <td>{{$post->user->name}}</td>
              @if($post->category_id == 0)
                  <td>Unknown</td>
              @else
                  <td>{{$post->category->name}}</td>
              @endif
              <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/600x400'}}" alt=""></td>
              <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
              <td>{{str_limit($post->body, 30)}}</td>
              @if ($post->created_at == null)
                  <td>{{$post->created_at}}</td>
              @else
                  <td>{{$post->created_at->diffForHumans()}}</td>
              @endif
              @if ($post->updated_at == null)
                  <td>{{$post->updated_at}}</td>
              @else
                  <td>{{$post->updated_at->diffForHumans()}}</td>
              @endif
          </tr>
            @endforeach
        @endif
        </tbody>
      </table>
    </div>

    </body>
    </html>

    @stop