
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
                    <a class="inline-block text-gray-600 font-bold no-underline hover:text-gray-600 hover:underline py-2 px-2" href="{{route('portfolio.index')}}">PORTFOLIO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

      <section class="relative py-20">
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
          style="transform: translateZ(0px)"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-white fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4">
        @foreach ($repositories as $repository)
          <div class="items-center flex flex-wrap">
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
              <img
                alt="..."
                class="max-w-full rounded-lg shadow-lg"
                src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
              />
            </div>
            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
              <div class="md:pr-12">
                <div
                  class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
                >
                  <i class="fas fa-rocket text-xl"></i>
                </div>
                <h3 class="text-3xl font-semibold">{{$repository->name}}</h3>
                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                  {{$repository->description}}
                </p>
                <ul class="list-none mt-6">
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                          ><i class="fas fa-fingerprint"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-blueGray-500">
                          Click <a href="{{$repository->html_url}}">HERE</a> to go to the repository
                        </h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </section>



@endsection
