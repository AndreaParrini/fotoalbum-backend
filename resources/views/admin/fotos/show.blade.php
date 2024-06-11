@extends('layouts.admin')


@section('content')
    <div class="bg-warning py-5">
        <div class="container d-flex justify-content-between align-items-center text-dark">
            <h3 class="my-3 text-uppercase text-center">{{ $foto->title }}</h3>
            <a href="{{ route('admin.fotos.index') }}" class="text-decoration-none text-dark fs-5"><i
                    class="fa fa-arrow-circle-left me-1" aria-hidden="true"></i>Back</a>
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
                </div>
            </div>
            <div class="col-6 my-5 text-center ">
                <div class="d-flex align-items-center justify-content-center gap-5">

                    <div class="">
                        <i class="fa fa-star fa-2xl {{ $foto->in_evidenza ? 'text-warning' : 'text-dark' }}"
                            aria-hidden="true" title="In Evidenza"></i>
                    </div>
                    <div class="fs-5">
                        <i class="fa fa-folder fa-lg" aria-hidden="true"></i>
                        {{ $foto->category ? $foto->category->name : 'N/a' }}
                    </div>
                </div>
                <h3 class="text-uppercase my-4">{{ $foto->title }}</h3>
                <p class="fst-italic">{{ $foto->description }}</p>
            </div>
        </div>

    </div>
@endsection
