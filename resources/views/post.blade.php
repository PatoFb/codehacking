@extends('layouts.blog-post')

@section('content')





        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="/admin">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toFormattedDateString()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->
@if(Auth::check())
        <!-- Comments Form -->
        @if(Session::has('comment_message'))
            {{session('comment_message')}}
            @endif
        <div class="well">
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control','placeholder'=>'Write a comment', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
@endif
        <hr>

        <!-- Posted Comments -->
@if(count($comments) > 0)
        <!-- Comment -->
        @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64 "class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->toFormattedDateString()}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                <div id="nested-comment" class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$comment->created_at->toFormattedDateString()}}</small>
                        </h4>
                        <p>{{$reply->body}}</p>
                    </div>
                </div>
                        @endif
                    @endforeach
                @endif
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                    <div id="nested-form" class="form-group">
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        {!! Form::textarea('body', null, ['class'=>'form-control','placeholder'=>'Write a reply', 'rows'=>1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}



            </div>
        </div>

            @endforeach
@endif




    @stop