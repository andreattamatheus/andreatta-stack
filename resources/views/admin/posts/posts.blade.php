@extends('layouts.admin.dashboard')

@section('css')
<style>
    .fa-tools:hover{color:blue!important;}
</style>

@endsection

@section('content')
<div class="w-full mb-12 px-4 pt-12">
    <div
      class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
    >
        @if (\Session::has('message'))
            <x-message-crud :type="success" :message="\Session::get('message')"/>
        @endif

        @if (!$errors->isEmpty())
            @foreach ($errors->all() as $error)
                <x-message-crud :type="alert" :message="$error"/>
            @endforeach
        @endif

        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div
                class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                >
                    <a href="{{route('post.create')}}">Novo +</a>
                </div>
            </div>
        </div>

        <table class="divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nome
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Título
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ações
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://media-exp1.licdn.com/dms/image/C4E03AQHOxROZn5mBEA/profile-displayphoto-shrink_200_200/0/1627347714929?e=1646265600&v=beta&t=sWK-kUxs8pMWCrqeNvHAUOK7TPJdhOHRqUZ-bn-kOng" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$post->author}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{Auth::user()->email}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a class="text-indigo-600 hover:text-indigo-900" href="{{route('blog.post.show', ['id' => $post->id ])}}">{{$post->title}}</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$post->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}} ">
                                {{$post->status ? 'Ativo' : 'Inativo'}}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium ">
                            <a href="{{route('post.edit', ['id' => $post->id ])}}" class="text-indigo-600">
                                <i class="fas fa-tools mr-2 text-sm text-blueGray-300"></i>
                            </a>
                            <button onclick="openModalDelete({{$post->id}})" class="text-indigo-600 cursor-pointer" data-modal-toggle="popup-modal">
                                <i class="fas fa-trash mr-2 text-sm text-blueGray-300"></i>
                            </button>
                            <x-modal-delete :id="$post->id"/>
                        </td>
                    </tr>
                @endforeach
                <!-- More people... -->
            </tbody>
        </table>

        <div class="mx-8 my-4">
            {{ $posts->links() }}
        </div>

    </div>
</div>

	<!--/container-->


@endsection

@section('script')
<script>
    let buttonNewPost = document.getElementById("newPost");
    buttonNewPost.onclick = function()   {
        location.href = buttonNewPost.getAttribute('data-href')
    }

</script>
<script>
    function openModalDelete(id)
    {
        let modalDelete = document.querySelector(".delete-" + id);
        modalDelete.classList.remove("hidden");
    }
</script>
@endsection

</html>
