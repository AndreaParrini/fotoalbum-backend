@extends('layouts.app')

@section('content')
    <div class="bg-warning py-5">
        <div class="container">
            <h3>All foto</h3>
        </div>
    </div>
    <div class="container py-5">
        @include('partials.message')
        @include('partials.error')

        <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-lg-3 row-cols-xxl-4 ">
            @forelse ($fotos as $foto)
                <div class="col mb-3">
                    <a class="text-decoration-none" href="{{ route('admin.fotos.show', $foto) }}">
                        <div class="card h-100">
                            @if (Str::startsWith($foto->image_path, 'https://'))
                                <img class="card-img-top" src="{{ $foto->image_path }}" alt="{{ $foto->title }}" />
                            @else
                                <img class="card-img-top" src="{{ asset('storage/' . $foto->image_path) }}"
                                    alt="{{ $foto->title }}">
                            @endif

                            <div class="card-body">
                                <h4 class="card-title">{{ $foto->title }}</h4>
                                <p class="card-text">{{ $foto->description }}</p>
                            </div>
                            <i class="fa fa-star fa-xl position-absolute {{ $foto->in_evidenza ? 'text-warning' : 'text-light' }}"
                                aria-hidden="true" style="right: 1rem; top: 1rem"></i>
                        </div>
                    </a>
                </div>

            @empty
                <div class="col-12">
                    Non ci sono foto
                </div>
            @endforelse
        </div>

        <a class="btn btn-primary btn-lg rounded-pill position-fixed" style="right: 5rem; bottom: 5rem"
            href="{{ route('admin.fotos.create') }}" role="button"> <i class="fa fa-plus" aria-hidden="true"></i> ADD </a>
    </div>
@endsection
