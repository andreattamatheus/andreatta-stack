@extends('layouts.site-layout')


@section('content')
    <nav id="header" class="fixed w-full z-10 top-0 bg-gray-200 font-sans leading-normal tracking-normal">

        <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>
        <!--Nav-->
        <div class="container mx-auto flex items-center ">
            <div class="flex w-1/2 pl-4 text-sm py-2">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="mr-2">
                    <a class="inline-block py-2 px-2 text-gray-600 no-underline hover:underline" href="{{route('index')}}">HOME</a>
                    </li>
                    <li class="mr-2 bg-blueGray-200 rounded-lg">
                    <a class="inline-block text-gray-600 font-bold no-underline hover:text-gray-600 hover:underline py-2 px-2" href="#">BLOG</a>
                    </li>
                    <li class="mr-2">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-600 hover:underline py-2 px-2" href="{{route('portfolio.index')}}">PORTFOLIO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container px-4 md:px-0 max-w-6xl mx-auto mt-16">
        <div class="mx-0 sm:mx-6">
            <!--Posts Container-->
            <div class="flex flex-wrap justify-between pt-12 -mx-6">
                @foreach ($posts as $post)
                    <!--1/3 col -->
                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                            <a href="{{route('blog.show', ['id' => $post->id ])}}" class="flex flex-wrap no-underline hover:no-underline">
                                <img src="{{$post->img_url}}" class="h-64 w-full rounded-t pb-6">
                                <p class="w-full text-gray-600 text-xs md:text-sm px-6">{{$post->tag}}</p>
                                <div class="w-full font-bold text-xl text-gray-900 px-6">{{$post->title}}</div>
                                <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                    {{substr($post->content, 0, 100)}}
                                </p>
                            </a>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                            <div class="flex items-center justify-between">
                                <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="{{$post->user->name}}" src="{{$post->user->img_url}}" alt="Avatar of Author">
                                <p class="text-gray-600 text-xs md:text-sm">1 MIN READ</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="mx-8 my-4">
                {{ $posts->onEachSide(5)->links() }}
            </div>
        </div>
    </div>

@endsection
