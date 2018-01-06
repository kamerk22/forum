<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{  asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <style>
        #main {
            margin-top: 50px;
        }

    </style>
</head>
<body>
<section id="main">
    @include('layouts.flash')
    <section id="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

</section>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
