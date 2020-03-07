<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat+Alternates:200,300,400,500,600,700,800|Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
<div id="app">
    <div class="flex flex-no-wrap  h-full  bg-gray-100">
        <div class="bg-blue-900 shadow pt-8 transition-all duration-500 w-3/12 lg:w-1/12">
            <div class="flex flex-col justify-center py-16 lg:py-32 items-center transition-all duration-500">
                <div class="w-full">
                    <ul class="flex flex-col text-center transition-all duration-500 ">


                        <li class="transition duration-500" >
                            <a href="{{route('admin.skills.index')}}" class="flex items-center py-4 text-sm uppercase font-semibold outline-none transition duration-500">
                                <svg class="fill-current  mx-auto h-6 w-6 {{ request()->is('chs_admin/skills') ? ' text-teal-500' : ' text-gray-400' }}"  viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" >
                                    <path d="M10 0s8 7.58 8 12a8 8 0 1 1-16 0c0-1.5.91-3.35 2.12-5.15A3 3 0 0 0 10 6V0zM8 0a3 3 0 1 0 0 6V0z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="transition duration-500" >
                            <a href="{{route('admin.projects.index')}}" class="text-teal-500 flex items-center py-4 text-sm uppercase font-semibold outline-none transition duration-500 @if(request()->route()->named('admin.projects.index')) text-teal-500 @endif">
                                <svg class="fill-current mx-auto h-6 w-6 {{ request()->is('chs_admin/projects') ? ' text-teal-500' : ' text-gray-400' }}"  viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" >
                                    <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-9/12 bg-gray-800 lg:w-11/12 transition-all duration-500 min-h-screen">
            <div class="hidden sm:block py-6 border-b border-blue-800">
                <div class="px-16 flex justify-between items-center">
                    <div class="font-medium text-xl text-gray-500 font-rubik flex items-center">
                        <a href="#">
                            cheickahmedsidibe.com
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="#" @click.prevent="logout">
                            <svg class="fill-current hidden lg:block lg:h-5 lg:w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.16 4.16l1.42 1.42A6.99 6.99 0 0 0 10 18a7 7 0 0 0 4.42-12.42l1.42-1.42a9 9 0 1 1-11.69 0zM9 0h2v8H9V0z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-6 sm:px-16 sm:py-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
