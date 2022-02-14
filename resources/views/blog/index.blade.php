@extends('layouts.post-layout')


@section('content')
    <nav id="header" class="fixed w-full z-10 top-0">

        <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

        <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-center mt-0 py-3">
            <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="{{route('index')}}">
                CLIQUE PARA VOLTAR PARA O COMEÇO
            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
    </nav>
    <!--Container-->
    <div class="flex flex-col md:max-w-1xl mx-24 pt-20 mb-8">
        @foreach ($posts as $post)
            @if (!($post->id%2) == 0 )
                <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2 mt-2 @if($posts->count() == $post->id)animate-pulse @endif">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{$post->img_url}}" alt="Man looking at item at a store">
                        </div>
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$post->tag}}</div>
                            <a href="{{route('blog.post.show', ['id' => $post->id ])}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{$post->title}}</a>
                            <div class="mt-2 text-gray-500">
                                {{substr($post->content, 0, 100)}}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl @if($postCounter == $post->id)animate-pulse @endif">
                    <div class="md:flex">
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold text-right">{{$post->tag}}</div>
                            <a href="{{route('blog.post.show', ['id' => $post->id ])}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline text-right">{{$post->title}}</a>
                            <div class="mt-2 text-gray-500 text-right">
                                {{substr($post->content, 0, 100)}}
                            </div>
                        </div>
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{$post->img_url}}" alt="Man looking at item at a store">
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

        <div class="mx-8 my-4">
            {{ $posts->onEachSide(5)->links() }}
        </div>

    </div>
    <!--/container-->
@endsection
