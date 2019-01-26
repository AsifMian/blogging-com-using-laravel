@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

@section('content')
    <h1>Edit Post </h1>

    {!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title:')}}
        {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter Title here'])}}
    </div>

    <div class="form-group">
        {{Form::label('body','Body:')}}
        {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter body text here'])}}
    </div>
    {{--//to make the put request we have add this line--}}
    {{Form::hidden('_method','PUT')}}

    <div class="form-group">
        {{form::file('cover_image')}}
    </div>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection