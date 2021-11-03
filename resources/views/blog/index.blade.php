@extends('layouts.post-layout')


@section('content')

    <!--Container-->
    <div class="flex flex-col md:max-w-1xl mx-24 pt-20 mb-8">
        @foreach ($posts as $post)
            @if (!($post->id%2) == 0 )
                <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2 mt-2">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:h-full md:w-48" src="#" alt="Man looking at item at a store">
                        </div>
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{$post->tag}}</div>
                            <a href="{{route('post.show', ['id' => $post->id ])}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{$post->title}}</a>
                            <div class="mt-2 text-gray-500">
                                {{substr($post->content, 0, 100)}}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold text-right">{{$post->tag}}</div>
                            <a href="{{route('post.show', ['id' => $post->id ])}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline text-right">{{$post->title}}</a>
                            <div class="mt-2 text-gray-500 text-right">
                                {{substr($post->content, 0, 100)}}
                            </div>
                        </div>
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:h-full md:w-48" src="/img/store.jpg" alt="Man looking at item at a store">
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>
    <!--/container-->
@endsection
