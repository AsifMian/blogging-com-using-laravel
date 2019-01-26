@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@section('content')

    <a href="/posts" class="btn btn-primary">Go Back</a>
    <br>
    <br>
    <h1 class="text-capitalize text-center bg-white card-header" >{{$post->title}}</h1>
    <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">

    <div class="card p-3">
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}} BY {{$post->user->name}}</small>
    <br>
    <br>
    {{--we check that if user is not guest only then show edit and delete --}}
    @if(!auth()->guest())
        {{--we check that post is created by loggedin user the
         only then show edit and delete  by adding--}}
        @if(auth()->user()->id == $post->user_id )
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit Post</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST']) !!}
            {{Form::hidden('_method','Delete')}}
            {{form::submit('Delete',['class'=>'btn btn-danger float-right'])}}
            {!! Form::close() !!}
            @endif
    @endif
@endsection