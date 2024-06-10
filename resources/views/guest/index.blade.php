@extends('layouts.guest')

@section('content')
    <div class="bg-warning py-5">
        <div class="container d-flex justify-content-between align-items-center text-dark">
            <h3 class="my-3 text-uppercase text-center">{{ $foto->title }}</h3>
            <a class="btn btn-primary" href="{{ route('admin.fotos.index') }}"><i class="fas fa-arrow-left me-1"
                    aria-hidden="true"></i>Return all fotos</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 my-5 text-center ">
                <div class="rounded-4 position-relative">

                    @if (Str::startsWith($foto->image_path, 'https://'))
                        <img class="rounded-4" src="{{ $foto->image_path }}" alt="{{ $foto->title }}">
                    @else
                        <img class="rounded-4" src="{{ asset('storage/' . $foto->image_path) }}" alt="{{ $foto->title }}">
                    @endif
                    <div class="position-absolute p-5 top-0 end-0">
                        <i class="fa fa-star fa-2xl {{ $foto->in_evidenza ? 'text-warning' : 'text-light' }}"
                            aria-hidden="true" title="In Evidenza"></i>
                    </div>
                </div>
            </div>
            <div class="col-6 my-5 text-center ">
                <h3 class="text-uppercase my-4">{{ $foto->title }}</h3>
                <p class="fst-italic">{{ $foto->description }}</p>
            </div>
        </div>

    </div>
@endsection
