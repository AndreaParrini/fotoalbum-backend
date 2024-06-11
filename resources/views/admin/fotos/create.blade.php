@extends('layouts.admin')

@section('content')
    <div class="bg-warning py-5">
        <div class="container d-flex justify-content-between">
            <h3>Add a new Foto</h3>
            <a href="{{ route('admin.fotos.index') }}" class="text-decoration-none text-dark fs-5"><i
                    class="fa fa-arrow-circle-left me-1" aria-hidden="true"></i>Back</a>
        </div>
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

            <div class="d-lg-flex gap-4">
                <div class="input-group mb-3 w-auto">
                    <label class="input-group-text" for="image_path">Upload Image</label>
                    <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path"
                        name="image_path">
                </div>

                <div class="input-group mb-3 w-auto">
                    <label class="input-group-text" for="category_id">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" id="category_id">
                        <option selected disabled>Choose a category of Image</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @empty
                        @endforelse

                    </select>
                </div>
            </div>

            @error('image_path')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">
                Create
            </button>

        </form>

    </div>
@endsection
