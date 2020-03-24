@extends('admin.layouts.default')

@section('title')
    Edit {{ $project->name }}
@endsection

@section('content')
    <div class=" my-6 lg:my-12 lg:mt-6">
        <a href="{{route('admin.projects.index')}}">
            <svg class="h-6 w-6 mb-8 lg:mb-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"/>
            </svg>
        </a>


        <div class="w-full lg:w-8/12 mx-auto">
            <form method="post" action="{{route('admin.projects.update',$project)}}">
                @csrf()
                @method('PATCH')
                <div class="w-full mb-4 lg:mb-8">
                    <label for="name" class="block mb-2 text-gray-400 font-medium">Name</label>
                    <input type="text"
                           class="block w-full border-2 @error('name') border-red-500 @enderror  p-3 bg-transparent rounded  text-gray-300 text-sm"
                           name="name" id="name" value="{{$project->name}}">
                    @error('name')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="website" class="block mb-2 text-gray-400 font-medium">Website</label>
                    <input type="text"
                           class="block w-full @error('website') border-red-500 @enderror border-2 p-3 bg-transparent rounded  text-gray-300 text-sm"
                           name="website" id="website" value="{{$project->website}}">
                    @error('website')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="githubUrl"
                           class="block mb-2 text-gray-400 font-montserrat font-medium">GithubUrl</label>
                    <input type="text"
                           class="block w-full @error('githubUrl') border-red-500 @enderror border-2 p-3 bg-transparent rounded  text-gray-300 text-sm"
                           name="githubUrl" id="githubUrl" value="{{$project->githubUrl}}">
                    @error('githubUrl')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w-full mb-4 lg:mb-8">
                    <label for="description"
                           class="block mb-2 text-gray-400 font-montserrat font-medium">Description</label>
                    <textarea type="text"
                              class="block w-full border-2 p-3 bg-transparent rounded text-gray-300 text-sm @error('description') border-red-500 @enderror"
                              name="description" id="description">{{$project->description}}</textarea>
                    @error('description')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div>
                    <div class="mb-4">
                        <h3 class="text-xl text-white">Skills</h3>
                        @error('skills')
                        <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if(isset($skills))
                        <div class="grid grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
                            @foreach($skills as $key => $value)
                                <label for="{{$value}}" class="flex items-center text-white">
                                    <input type="checkbox" name="skills[]" value="{{$key}}" class="mr-2">
                                    {{ $value }}
                                </label>
                            @endforeach

                        </div>
                    @endif
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
