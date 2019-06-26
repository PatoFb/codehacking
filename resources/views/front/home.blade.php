@extends('layouts.blog-home')

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- First Blog Post -->
            @if($posts)
                @foreach($posts as $post)
            <h2>
                {{$post->title}}
            </h2>
            <p class="lead">
                by {{$post->user->name}}
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toFormattedDateString()}}</p>
            <hr>
            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
            <hr>
            <p>{{str_limit($post->body, 300)}}</p>
            <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>


                @endforeach
            @endif
        <!-- Pagination -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes.front_sidebar')

    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection
