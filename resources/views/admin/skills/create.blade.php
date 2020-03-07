@extends('admin.layouts.default')
@section('title', 'new skill')

@section('content')
    <div>
        <a href="{{route('admin.skills.index')}}">
            <svg class="h-6 w-6 mb-8 lg:mb-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"></path>
            </svg>
        </a>
        <div class="w-full lg:w-7/12 mx-auto">
            <form method="post" action="{{route('admin.skills.store')}}" class="font-montserrat">
                @csrf()
                <div class="w-full mb-4 lg:mb-8">
                    <label for="name" class="block mb-2 text-gray-400 font-montserrat font-medium">Name</label>
                    <input id="name" type="text" name="name" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm">
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="description" class="block mb-2 text-gray-400 font-montserrat font-medium">Description</label>
                    <textarea type="text"  id="description" name="description" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm"
                    ></textarea>
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <h3 class="text-gray-300 text-2xl mb-2 sm:mb-4">Level</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach([ 'beginner', 'medium', 'advanced', 'expert' ] as $l)
                            <div class="">
                                <label class="flex items-center text-gray-300">
                                    <input type="radio" class="mr-2 capitalize" value="{{$l}}" name="level">
                                    {{ $l }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <h3 class="text-gray-300 text-2xl mb-2 sm:mb-4">Category</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach(['frontend','backend','devops','tools'] as $c)
                            <div class="">
                                <label class="flex items-center text-gray-300">
                                    <input type="radio" class="mr-2 capitalize" value="{{$c}}" name="category">
                                    {{ $c }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <button type="submit" class="py-3 px-6 rounded-lg border border-teal-500 text-teal-500">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
