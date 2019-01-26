<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
   @include('inc.navbar')
        <main class="py-4">
            <div class="container">
                <div class="col-sm-10 m-auto">
                @include('inc.messages')
                </div>
                @yield('content')
            </div>
        </main>
    </div>

    {{--ck editor Scrip--}}
    {{--<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>--}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
       // CKEDITOR.replace( 'article-ckeditor');
    </script>
    {{--end ck editor--}}
</body>
</html>
