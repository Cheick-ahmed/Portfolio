<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Full stack developer</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat+Alternates:200,300,400,500,600,700,800|Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
<div id="app">
    <the-navigation home_link="{{route('index')}}" cv_link="{{asset('docs/SidibeCheickAhmed_DevFullstack.pdf')}}"></the-navigation>
    @yield('content')
    @include('layouts.partials.theFooter')
</div>
</body>
</html>
