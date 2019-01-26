@extends('layouts.app')


@section('content')
    <div class="col-sm-10 m-auto">
        <h2 class="title "><b>Posts</b></h2>

    @if(count($posts)>0)
       @foreach($posts as $post)
           <div class="card list-group-item bg-light">

               <div class="row">
               <div class="col-sm-4 col-md-4">
                   <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
               </div>

               <div class="col-sm-8 col-md-8">
                   <br>
                   <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                   <small>By  <b>{{$post->user->name}}</b></small>
                   <br>
                   <small>written on {{$post->created_at}}</small>
               </div>
               </div>
           </div>
           <br>
           @endforeach
        @else
        <p>No posts Found!</p>
    @endif


    </div>
    @endsection
