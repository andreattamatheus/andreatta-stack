@extends('layouts.admin.dashboard')


@section('css')


@endsection

@section('content')

<div class="w-full mb-12 px-4 pt-12">
    <div class="flex flex-wrap">
        <div class="w-full lg:w-8/12 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Olá, {{Auth::user()->name}}
                        </h6>
                    </div>
                </div>

                @if (\Session::has('message'))
                    <x-message-crud :type="success" :message="\Session::get('message')"/>
                @endif

                @if (!$errors->isEmpty())
                    @foreach ($errors->all() as $error)
                        <x-message-crud type="alert" :message="$error"/>
                    @endforeach
                @endif

                <div class="flex-auto px-4 lg:px-4 py-10 pt-0">
                    <form action="{{route('user.update')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')

                        <input hidden name="id" value="{{Auth::id()}}">
                        <div class="flex flex-wrap mt-3">

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        Imagem
                                    </label>
                                    <input name="image" type="file"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        />
                                </div>
                            </div>


                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">

                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        Nome
                                    </label>
                                    <input type="text"
                                        name="name"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{Auth::user()->name}}" />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">

                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        Email
                                    </label>
                                    <input type="text"
                                        name="email"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{Auth::user()->email}}" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-4">
                            <div class="w-full lg:w-12/12 px-4">
                                <button
                                    class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')


@endsection
