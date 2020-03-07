@extends('admin.layouts.default')
@section('title')
    Edit {{ $skill->name }}
@endsection

@section('content')
    <div>
        <a href="{{route('admin.skills.index')}}">
            <svg class="h-6 w-6 mb-8 lg:mb-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"></path>
            </svg>
        </a>
        <div class="w-full lg:w-7/12 mx-auto">
            <form method="post" action="{{route('admin.skills.update', $skill)}}" class="font-rubik">
                @csrf()
                @method('PATCH')

                <div class="w-full mb-4 lg:mb-8">
                    <label for="name" class="block mb-2 text-gray-400  font-medium">Name</label>
                    <input id="name" type="text" name="name" value="{{$skill->name}}" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm">
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="description" class="block mb-2 text-gray-400  font-medium">Description</label>
                    <textarea type="text" id="description" name="description" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm"
                    >{{$skill->description}}</textarea>
                </div>

                <div>
                    <button type="submit" class="py-2 px-6 rounded-lg border border-teal-500 text-teal-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
