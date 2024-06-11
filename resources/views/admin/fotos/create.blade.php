@extends('layouts.admin')

@section('content')
    <div class="container d-flex justify-content-between">
        <h3>Add a new Foto</h3>
        <a href="{{ route('admin.fotos.index') }}" class="text-decoration-none text-dark fs-5"><i
                class="fa fa-arrow-circle-left me-1" aria-hidden="true"></i>Back</a>
    </div>

    <div class="container py-5">
        <form action="{{ route('admin.fotos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex gap-4">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" placeholder="Lorem ipsum..." value="{{ old('title') }}">

                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="in_evidenza" name="in_evidenza"
                        {{ old('in_evidenza') ? 'checked' : '' }}>
                    <label class="form-check-label text-nowrap" for="in_evidenza">In Evidenza</label>
                </div>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3 input-group">
                <span class="input-group-text">Descrption</span>
                <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description">{{ old('description') }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <label class="input-group-text" for="image_path">Upload Image</label>
                <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path"
                    name="image_path">
            </div>
            @error('image_path')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">
                Create
            </button>

        </form>

    </div>
@endsection
