@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>


         @section('content')
                {{--@extends('layouts.app')--}}
            <div class="content">
                <div class="title m-b-md">
                   Bloging
                </div>
                <div class="jumbotron col-sm-9 m-auto">
                    <h1>Blogging site using Laravel JANUARY 19 by ASIF</h1>
                    <p class="text-black-50 text-capitalize">Because blogging is cool thing</p>
                </div>
                <div class="links">
                    {{--<a href="/about"></a>--}}
                </div>
            </div>
             @endsection

