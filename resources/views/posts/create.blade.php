@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

@section('content')
     <h1>Create A New Post </h1>

     {!! Form::open(['action' => 'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
       <div class="form-group">
            {{Form::label('title','Title:')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter Title here'])}}
       </div>

     <div class="form-group">
          {{Form::label('body','Body:')}}
          {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter body text here'])}}
     </div>
           <div class="form-group">
               {{form::file('cover_image')}}
           </div>
     {{Form::submit('submit',['class'=>'btn btn-primary'])}}
     {!! Form::close() !!}


    @endsection