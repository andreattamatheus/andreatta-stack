@extends('layouts.site-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Github Repositories</h1>
            </div>
        </div>
        <div class="card col-xl-6 col-md-12">
            <div class="card-body ">
                <h4>Search for your repositories:</h4>
                <div class="input-group input-group-outline">
                    <form role="form" class="text-start" action="{{route('repository.search')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="username"
                            placeholder="Type your username...">
                    </form>
                </div>
            </div>
        </div>

        <div class="my-4">
            <div class="row">

                @foreach ($repositories as $repository)
                <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">
                                    @foreach ($repository->topics as $topic)
                                    {{$topic}}
                                    @endforeach
                                </p>
                                <h4 class="text-blueGray-500">
                                    <a href="{{$repository->html_url}}">{{$repository->name}}</a>
                                </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0">{{$repository->description}}</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <a href="{{$repository->html_url}}" class="btn btn-outline-primary btn-sm mb-0">View
                                    Project</a>
                                <div class="avatar-group mt-2">
                                    <a href="{{$repository->owner->html_url}}" class="avatar avatar-xs rounded-circle"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="{{$repository->owner->login}}">
                                        <img alt="Image placeholder" src="{{$repository->owner->avatar_url}}">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
