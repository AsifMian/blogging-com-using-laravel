@extends('layouts.app')

@section('content')
     <h1>{{$title}}</h1>
    <div class="col-sm-6  m-auto mt-4 ">
        <div class="card">
            <h2 class="text-center card-header">This is about page</h2>
            <p class="p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi expedita hic incidunt maiores maxime officiis quasi tenetur! Consequatur error facere hic illo necessitatibus obcaecati odit perspiciatis, quas quidem repudiandae ut!</p>
        </div>
        @if(count($services)>0)
            <h4 class="text-center text-capitalize"><mark>our Servies Are:</mark></h4>
            <ul class="list-group">
         @foreach($services as $service)

                 <li class="list-group-item">{{$service}}</li>

            @endforeach
             </ul>
        @endif
    </div>

    @endsection