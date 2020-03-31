@extends('layouts.default')

@section('title','Cheick ahmed')

@section('content')
    <section class="min-h-screen flex justify-center items-center">
        <div class="container">
            <div class="font-medium lg:pt-16 text-gray-500 font-rubik tracking-wide">
                <h3 class="tracking-wider text-2xl sm:text-5xl mb-4 sm:mb-6">
                    Hi there, I'm Ahmed.
                </h3>
                <div class="w-full sm:w-6/12 mb-12">
                    <p class="tracking-wide leading-7">
                        I'm a Full stack web <span class="capitalize text-teal-500 font-medium">developer</span> based
                        in Paris.
                        I'm looking for an awesome company ready to bring in life awesome ideas on the web.
                    </p>
                </div>

                <div class="text-teal-500">
                    <a href="mailto:chs.ahmed_pro02@outlook.com" class="py-2 font-medium px-6 sm:px-8 font-thin rounded border border-teal-500">
                       Hire me
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="min-h-screen sm:py-20">
        <div class="container">
            <h3 class="section-title relative text-3xl sm:text-4xl capitalize font-rubik text-teal-500 mb-6 sm:mb-12">
                About me
            </h3>

            <div class="w-full sm:w-7/12 mb-6  font-rubik tracking-wide text-gray-500">
                <div class="tracking-wide leading-8 ">
                    <p class=" ">
                        I'm 22 years old student at University Paris Descartes currently studying web development.
                    </p>
                    <p>
                        Apart from the courses included in my degree, I've taken a number of online courses such as The
                        Complete Javascript Course, Advanced CSS & Sass, Vue.js: the Complete Guide and more.
                        I'm currently taking Dart & Flutter.
                    </p>
                </div>
            </div>
            <div class="mt-8">
                <p class="tracking-wide leading-7 mb-6 text-gray-300 font-rubik text-lg font-medium">
                    There are a technologies I've been working with recently :
                </p>
                <div class="grid grid-cols-2 font-rubik tracking-wide lg:grid-cols-4 gap-4">
                    @if($frontEnd->count())
                        <div>
                            <h3 class="text-teal-500 text-lg mb-4 sm:mb-5 tracking-wider">
                                Frontend
                            </h3>
                            <ul class="text-sm capitalize font-medium">
                                @foreach($frontEnd as $f)
                                    <li class="text-teal-500 mb-4">
                                        &rarr; <span class="mx-2 text-gray-500"> {{ $f->name }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($backEnd->count())
                        <div>
                            <h3 class="text-teal-500 text-lg mb-4 sm:mb-5 tracking-wider">
                                Backend
                            </h3>
                            <ul class="text-sm  font-medium">
                                @foreach($backEnd as $b)
                                    <li class="text-teal-500 mb-4  capitalize">
                                        &rarr; <span class="mx-2 text-gray-500"> {{ $b->name }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($devops->count())
                        <div>
                            <h3 class="text-teal-500 text-lg mb-4 sm:mb-5 tracking-wider">
                                Devops
                            </h3>
                            <ul class="text-sm uppercase font-medium">
                                @foreach($devops as $d)
                                    <li class="text-teal-500 mb-4  capitalize">
                                        &rarr; <span class="mx-2 text-gray-500"> {{ $d->name }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($tools->count())
                        <div>
                            <h3 class="text-teal-500 text-lg mb-4 sm:mb-5 tracking-wider">
                                Tools
                            </h3>
                            <ul class="text-sm uppercase font-medium">
                                @foreach($tools as $t)
                                    <li class="text-teal-500 mb-4  capitalize">
                                        &rarr; <span class="mx-2 text-gray-500"> {{ $t->name }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="works" class="min-h-screen sm:py-20">
        <div class="container">
            <h3 class="section-title relative text-3xl sm:text-4xl capitalize font-montserrat text-teal-500 mb-6 sm:mb-12">
                Projects
            </h3>
            @foreach($projects as $i => $project)
                <div class="font-montserrat flex flex-wrap lg:flex-no-wrap opacity-100 mb-32 transition-all duration-700">

                    <div class="w-full flex lg:w-7/12 relative lg:rounded {{ ($i+1) % 2 == 0 ? ' order-first lg:order-last' : ' lg:justify-end' }}">
                        <div class="absolute bg-blue-900 h-full lg:rounded-lg w-full opacity-40 hover:opacity-0 transition-all duration-500"></div>
                        @if(isset($project->images()->first()->path))
                            <img src="{{ $project->images()->first()->path }}"
                                 alt="{{ $project->images()->first()->name }}"
                                 class="lg:rounded object-cover h-64 lg:h-full w-full">
                        @endif
                    </div>
                    <!-- Project title -->
                    <div class="w-full h-full lg:w-5/12 bg-blue-900 lg:bg-transparent h-full py-6 lg:py-16 ">
                        <h3 class="mx-4 lg:mx-0 text-xl lg:text-3xl font-bold text-gray-100 lg:mb-6 {{ ($i+1) % 2 == 0 ? ' lg:text-left' : ' lg:text-right' }}">
                            {{ $project->name }}
                        </h3>
                        <div class="bg-blue-900 lg:rounded p-4 lg:mb-8 text-md leading-7 text-gray-400 lg:shadow {{ ($i+1) % 2 == 0 ? ' lg:text-left lg:mr-6' : ' lg:text-right lg:ml-6' }}">
                            {{ $project->description }}
                        </div>
                        @if($project->skills->count())
                            <div class="mb-4 py-1 font-rubik">
                                <ul class="flex flex-wrap uppercase text-gray-400 text-xs font-medium {{ ($i+1) % 2 == 0 ? '' : ' lg:justify-end' }}">
                                    @foreach($project->skills as $skill )
                                        <li class="mx-4 mb-2"> {{ $skill->name }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flex items-center {{ ($i+1) % 2 == 0 ? '' : ' lg:justify-end' }} ">
                            <a href="{{$project->githubUrl ?? ''}}" class="mx-4" target="_blank">
                                <svg class="fill-current text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path>
                                </svg>
                            </a>
                            <a href="{{$project->website ?? ''}}" class="mx-4" target="_blank">
                                <svg class="fill-current text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 194.818 194.818"><title>External</title>
                                    <g>
                                        <path d="M185.818,2.161h-57.04c-4.971,0-9,4.029-9,9s4.029,9,9,9h35.312l-86.3,86.3c-3.515,3.515-3.515,9.213,0,12.728 c1.758,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636l86.3-86.3v35.313c0,4.971,4.029,9,9,9s9-4.029,9-9v-57.04 C194.818,6.19,190.789,2.161,185.818,2.161z"></path>
                                        <path d="M149,77.201c-4.971,0-9,4.029-9,9v88.456H18v-122h93.778c4.971,0,9-4.029,9-9s-4.029-9-9-9H9c-4.971,0-9,4.029-9,9v140 c0,4.971,4.029,9,9,9h140c4.971,0,9-4.029,9-9V86.201C158,81.23,153.971,77.201,149,77.201z"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

            @endforeach
            <div class="w-full my-16 mx-auto text-center text-sm">
                <a href="{{route('archives.index')}}"
                   class="p-3 px-8 border border-teal-500 rounded text-center text-teal-500 font-rubik py-3">
                    Show More &rarr;
                </a>
            </div>
        </div>
    </section>

    <section id="contact" class="min-h-screen flex flex-col items-center justify-center font-rubik tracking-wider">
        <h2 class="text-xl text-teal-500 text-center mb-4">What's Next ?</h2>
        <h3 class="text-3xl md:text-5xl font-semibold  text-gray-400 mb-6">Get In Touch</h3>
        <div class="w-full sm:w-6/12 mb-8 sm:mb-16">
            <p class="text-md leading-8 text-gray-500 text-center">
                I'm currently looking for <span class="text-teal-500">Full-time</span> opportunities as <span class="text-teal-500">Junior developper</span>. <br>
                Feel free to reach out if you're looking for a developer, have a question, or just want to connect.
            </p>
        </div>
        <div class="text-teal-500">
            <a href="mailto:chs.ahmed_pro02@outlook.com" class="text-sm py-3 font-medium px-6 sm:px-8 font-thin rounded border border-teal-500">
                Say hello
            </a>
        </div>
    </section>
@endsection
