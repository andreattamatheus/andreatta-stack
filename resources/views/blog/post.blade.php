
@extends('layouts.post-layout')

@section('content')
    <nav id="header" class="fixed w-full z-10 top-0">

        <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

        <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-center mt-0 py-3">
            <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="{{route('blog.index')}}">
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
	<div class="container w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <div class="font-sans">
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{$post->title}}</h1>
                <p class="text-sm md:text-base font-normal text-gray-600">Publicado {{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</p>
            </div>
            <img class="pt-10" src="{{$post->img_url}}" alt="" srcset="">
            <div>
                {{$post->content}}
            </div>
		</div>

		<!--Tags -->
		<div class="text-base md:text-sm text-gray-500 px-4 py-6">
			Tags: <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a> . <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a>
		</div>

		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-1 mx-4">


		<!--Subscribe-->
		{{-- <div class="container px-4">
			<div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center">
				<h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to my Newsletter</h2>
				<h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered right to your inbox</h3>
				<div class="w-full text-center pt-4">
					<form action="#">
						<div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
							<input type="email" placeholder="youremail@example.com" class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
							<button type="submit" class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div> --}}
		<!-- /Subscribe-->



		<!--Author-->
		<div class="flex w-full items-center font-sans px-4 py-12">
			<img class="w-10 h-10 rounded-full mr-4" src="{{$post->user->img_url}}" alt="Avatar of Author">
			<div class="flex-1 px-2">
				<p class="text-base font-bold text-base md:text-xl leading-none ">{{$post->author}}</p>
				<p class="text-gray-600 text-xs md:text-base">Desenvolvedor da vida</a></p>
			</div>
			{{-- <div class="justify-end">
				<button class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Read More</button>
			</div> --}}
		</div>
		<!--/Author-->

		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">



		<!--/Next & Prev Links-->

	</div>
	<!--/container-->

@endsection
