
@extends('layouts.site-layout')

@section('content')
      <section >
        <div class="mx-auto px-4 my-4">
            <div class="row">
                @foreach ($repositories as $repository)
                <div class="col-xl-6 col-sm-6 mb-xl-0 my-4">
                    <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
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
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

      </section>
@endsection
