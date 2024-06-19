@extends('layouts.admin')


@section('content')
    <div class="bg-info py-5">
        <div class="container d-flex justify-content-between">
            <h3>Foto of {{ $category->name }}</h3>
            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark fs-5"><i
                    class="fa fa-arrow-circle-left me-1" aria-hidden="true"></i>Back</a>
        </div>
    </div>
    <div class="container py-5">

        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-xs-1">
            @forelse ($allCategoryFotos as $foto)
                <div class="col mb-3">
                    <a class="text-decoration-none" href="{{ route('admin.fotos.show', $foto) }}">
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
                            <div class="position-absolute top-0 end-0 p-2  bg-light bg-opacity-50">
                                <i class="fa fa-star fa-2xl {{ $foto->in_evidenza ? 'text-warning' : 'text-dark' }}"
                                    aria-hidden="true" title="In Evidenza"></i>
                            </div>

                        </div>
                    </a>


                </div>
            @empty
                <div>
                    No fotos to this category
                </div>
            @endforelse
        </div>

        {{ $allCategoryFotos->links('pagination::bootstrap-5') }}
    </div>
@endsection
