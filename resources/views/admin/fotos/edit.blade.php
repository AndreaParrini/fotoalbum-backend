@extends('layouts.app')

@section('content')
    <div class="bg-warning py-5">
        <div class="container">
            <h3>Add a new Foto</h3>
        </div>
    </div>

    <div class="container py-5">
        <form action="{{ route('admin.fotos.update', $foto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex gap-4">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" placeholder="Lorem ipsum..." value="{{ old('title', $foto->title) }}">

                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="in_evidenza" name="in_evidenza"
                        {{ old('in_evidenza', $foto->in_evidenza) ? 'checked' : '' }}>
                    <label class="form-check-label text-nowrap" for="in_evidenza">In Evidenza</label>
                </div>
            </div>

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3 input-group">
                <span class="input-group-text">Descrption</span>
                <textarea class="form-control @error('description') is-invalid @enderror" aria-label="With textarea" name="description">{{ old('description', $foto->description) }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex gap-4 mb-4">
                <div>
                    @if (Str::startsWith($foto->image_path, 'https://'))
                        <img width="140" src="{{ $foto->image_path }}" alt="{{ $foto->image_path }}">
                    @else
                        <img width="140" src="{{ asset('storage/' . $foto->image_path) }}" alt="{{ $foto->image_path }}">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">Modify Image</label>
                    <input type="file" class="form-control" name="image_path" id="image_path" placeholder="Image PAth"
                        aria-describedby="fileHelpId" />
                    <div id="coverImageHelper" class="form-text">Uploade a new image</div>
                </div>
            </div>
            @error('image_path')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>
@endsection
