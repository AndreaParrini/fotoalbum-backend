@extends('layouts.app')


@section('content')
    <div class="bg-warning py-5">
        <div class="container">
            <h3>All foto</h3>
        </div>
    </div>
    <div class="container py-5">

        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-xs-1">
            @forelse ($fotos as $foto)
                <div class="col mb-3">
                    <a class="text-decoration-none" href="{{ route('fotos.show', $foto) }}">
                        <div class="card h-100">
                            @if (Str::startsWith($foto->image_path, 'https://'))
                                <img class="card-img-top" src="{{ $foto->image_path }}" alt="Cover Image">
                            @else
                                <img class="card-img-top" src="{{ asset('storage/' . $foto->image_path) }}"
                                    alt="Cover Image">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $foto->title }}</h4>
                                <p class="card-text">{{ $foto->description }}</p>
                            </div>
                            <div class="position-absolute top-0 end-0 p-2 bg-dark bg-opacity-50">
                                <i class="fa fa-star fa-2xl {{ $foto->in_evidenza ? 'text-warning' : 'text-light' }}"
                                    aria-hidden="true" title="In Evidenza"></i>
                            </div>

                        </div>
                    </a>


                </div>
            @empty
                <div>
                    No fotos here
                </div>
            @endforelse
        </div>

        {{ $fotos->links('pagination::bootstrap-5') }}
    </div>
@endsection
