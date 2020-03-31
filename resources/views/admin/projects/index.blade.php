@extends('admin.layouts.default')
@section('title', 'Projects')

@section('content')
    <div class="flex justify-between items-center mb-12">
        <h3 class="font-rubik text-3xl text-white font-medium">Projects ({{ count($projects)}})</h3>
        <a href="{{route('admin.projects.create')}}"
           class="outline-none -mr-2 bg-blue-900 text-center p-1 lg:p-2 rounded-full">
            <svg class="fill-current text-white h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z"></path>
            </svg>
        </a>
    </div>
    @if(count($projects))
        <div>
            <table class="sm:min-w-full">
                <thead>
                <tr class="text-gray-300">
                    <th class="px-2 py-3 text-left"></th>
                    <th class="px-5 py-3 text-left">Name</th>
                    <th class="px-5 py-3 text-left">Website</th>
                    <th class="px-5 py-3 text-left">GithubUrl</th>
                    <th class="px-5 py-3 text-left">Order</th>
                    <th class="px-5 py-3 text-left"></th>

                </tr>
                </thead>
                @foreach($projects as $project)
                    <tbody class="text-teal-500">
                    <tr class="border border-teal-500">
                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            {{ $project->id }}
                        </td>
                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            {{ $project->name }}
                        </td>
                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            {{ $project->website }}
                        </td>
                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            {{ $project->githubUrl }}
                        </td>
                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            {{ $project->order }}
                        </td>

                        <td class="px-5 py-5 border-b-4 border-teal-500 capitalize text-sm">
                            <div class="flex items-center">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="mr-6">
                                    <svg class="fill-current h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"></path>
                                    </svg>
                                </a>
                                <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button  type="button" onclick="confirm('{{ __("Are you sure you want to delete this project ?") }}') ? this.parentElement.submit() : ''" class="outline-none block">
                                        <svg class="fill-current h-4 w-4 text-red-600"
                                             xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v2H0V2zm1 3h18v13a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V5zm6 2v2h6V7H7z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @endif
@endsection
