@extends('layouts.site-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>URL Shortener</h1>

        </div>
    </div>
    <div class="card col-xl-6 col-md-12">
        <div class="card-body ">
            <h4>Making the life shorter, or not:</h4>
            <form role="form" class="text-start" action="{{route('url-shortener.store')}}" method="POST">
                @csrf
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Type the full url</label>
                    <input name="url" type="url" class="form-control">
                </div>
                @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Shortly</button>
                </div>
            </form>

        </div>
    </div>
    <div class="py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Links Overview</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Original link</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Shortener</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($urls as $url)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <a href="{{ $url->url }}">
                                                            {{ $url->url }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <a href="{{ $url->short_url }}">
                                                    {{ $url->short_url }}
                                                </a>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">
                                                {{ $url->active ? 'ONLINE' : 'OFFLINE' }}
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{route('url-shortener.destroy')}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $url->id }}">
                                                <button type="submit" class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-trash text-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection