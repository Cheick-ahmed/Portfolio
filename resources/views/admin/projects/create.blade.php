@extends('admin.layouts.default')

@section('title', 'New project')

@section('content')
    <div class=" my-6 lg:my-12 lg:mt-6">
        <a href="{{route('admin.projects.index')}}">
            <svg class="h-6 w-6 mb-8 lg:mb-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"/>
            </svg>
        </a>



        <div class="w-full lg:w-8/12 mx-auto">
            <form method="post" action="{{route('admin.projects.store')}}">
                @csrf()
                <image-uploader endpoint="{{route('admin.store.image')}}"></image-uploader>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="name" class="block mb-2 text-gray-400 font-montserrat font-medium">Name</label>
                    <input type="text" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm" name="name" id="name">
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="website" class="block mb-2 text-gray-400 font-montserrat font-medium">Website</label>
                    <input type="text" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm" name="website" id="website" >
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="githubUrl" class="block mb-2 text-gray-400 font-montserrat font-medium">GithubUrl</label>
                    <input type="text" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm" name="githubUrl" id="githubUrl" >
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="description" class="block mb-2 text-gray-400 font-montserrat font-medium">Description</label>
                    <textarea type="text" class="block w-full border-2 p-3 bg-transparent rounded  text-gray-300 text-sm" name="description" id="description"></textarea>
                </div>

                <div>
                    <button type="submit" class="py-2 px-6 rounded-lg border border-teal-500 text-teal-500">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
