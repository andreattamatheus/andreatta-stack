@extends('layouts.admin.dashboard')


@section('css')


@endsection

@section('content')

    <div class="px-4 md:px-10 pt-12 mx-auto w-full">
        <div class="container w-full md:max-w-3xl mx-auto mt-8">
                @if (!$errors->isEmpty())
                    @foreach ($errors->all() as $error)
                        <x-message-crud type="alert" :message="$error"/>
                    @endforeach
                @endif

                <form class="bg-white shadow-md rounded mb-4 lg:px-8 py-8 "  method="POST" action="{{route('post.store')}}" >
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Título
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Título">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Inserir imagem de capa:
                        </label>
                        <input required class="form-control" type="file" name="file" id="formFile">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                        Conteúdo
                        </label>
                        <textarea name="content" id="mytextarea">Hello, World!</textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{route('admin.posts.index')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Voltar
                        </a>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Salvar
                        </button>
                    </div>
                </form>
        </div>
	</div>

@endsection

@section('script')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

@endsection
