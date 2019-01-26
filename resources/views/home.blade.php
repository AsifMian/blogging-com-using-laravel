@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                           <h2 class="text-center">Welcome To Dashboard </h2>
                        <a href="/posts/create" class="btn btn-primary ">Create A Post</a>
                        <br>
                        <br>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th class="bg-dark text-white">Post</th>
                            <th class="bg-dark text-white" ></th>
                            <th class="bg-dark text-white"></th>
                        </tr>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST']) !!}
                                    {{Form::hidden('_method','Delete')}}
                                    {{form::submit('Delete',['class'=>'btn btn-danger float-right'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach


                    </table>
                            @else
                            <h4 class="text-center"><mark>You Have no post Yet.</mark></h4>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
