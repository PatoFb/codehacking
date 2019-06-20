@extends('layouts.admin')

@section('content')



@if(count($comments) > 0)

    <h1>Comments</h1>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
              <th>Post</th>
            <th>Author</th>
            <th>Email</th>
              <th>Body</th>
          </tr>
        </thead>
          @foreach($comments as $comment)
        <tbody>
          <tr>
            <td>{{$comment->id}}</td>
              <td><a href="{{route('home.post', $comment->post->slug)}}">{{$comment->post->title}}</a></td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
              <td>{{str_limit($comment->body, 30)}}</td>
              <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View replies</a></td>
            <td>
                @if($comment->is_active == 1)

                    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}


                        <input type="hidden" name="is_active" value="0">
                    <div class="form-group">
                        {!! Form::submit('Disapprove', ['class'=>'btn btn-info']) !!}
                    </div>

                    {!! Form::close() !!}

                  @else

                    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                    <input type="hidden" name="is_active" value="1">

                    <div class="form-group">
                      {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                    </div>

                      {!! Form::close() !!}

                @endif
            </td>

              <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}


                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  </div>
              </td>

          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    @else
    <h1 class="text-center">No comments</h1>
    @endif
<div class="row">
    <div class="form-group col-sm-offset-5">
        {{$comments->render()}}
    </div>
</div>

    @stop