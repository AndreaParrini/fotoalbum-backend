@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-lg-3 row-cols-xxl-4 ">
            @forelse ($fotos as $foto)
                <div class="col mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $foto->image_path }}" alt="Title" />
                        <div class="card-body">
                            <h4 class="card-title">{{ $foto->title }}</h4>
                            <p class="card-text">{{ $foto->description }}</p>
                        </div>
                    </div>

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
