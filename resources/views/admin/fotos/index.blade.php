@extends('layouts.admin')


@section('content')
    <div class="bg-warning py-5">
        <div class="container">
            <h3>All foto</h3>
        </div>
    </div>
    <div class="container py-5">
        @include('partials.message')
        @include('partials.error')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image Path</th>
                        <th scope="col">Slug</th>
                        <th scope="col" class="text-nowrap">In Evidenza</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fotos as $foto)
                        <tr class="">
                            <td scope="row">{{ $foto->id }}</td>
                            <td>{{ $foto->title }}</td>
                            <td>{{ $foto->description }}</td>
                            <td>
                                @if (Str::startsWith($foto->image_path, 'https://'))
                                    <img width="140" src="{{ $foto->image_path }}" alt="Cover Image">
                                @else
                                    <img width="140" src="{{ asset('storage/' . $foto->image_path) }}" alt="Cover Image">
                                @endif

                            </td>
                            <td>
                                {{ $foto->slug }}
                            </td>
                            <td>
                                <i class="fa fa-star fa-2xl {{ $foto->in_evidenza ? 'text-warning' : 'text-light' }}"
                                    aria-hidden="true" title="In Evidenza"></i>
                            </td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.fotos.show', $foto) }}"><i
                                        class="fa fa-eye me-1" aria-hidden="true"></i>View</a>
                                <a class="btn btn-sm btn-secondary" href="{{ route('admin.fotos.edit', $foto) }}"><i
                                        class="fa fa-pencil me-1" aria-hidden="true"></i>Edit</a>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalId--{{ $foto->id }}">
                                    <i class="fa fa-trash me-1" aria-hidden="true"></i>Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId--{{ $foto->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId--{{ $foto->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId--{{ $foto->id }}">
                                                    Delete a foto
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-wrap">
                                                You are about to destroy this foto :
                                                <strong>{{ $foto->title }}</strong> ?
                                                <div>

                                                    @if (Str::startsWith($foto->image_path, 'https://'))
                                                        <img class="w-100" src="{{ $foto->image_path }}"
                                                            alt="Cover Image">
                                                    @else
                                                        <img class="w-100"
                                                            src="{{ asset('storage/' . $foto->image_path) }}"
                                                            alt="Cover Image">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.fotos.destroy', $foto) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row">No Record to show</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{ $fotos->links('pagination::bootstrap-5') }}
        </div>

        <a class="btn btn-primary btn-lg rounded-pill position-fixed" style="right: 5rem; bottom: 5rem"
            href="{{ route('admin.fotos.create') }}" role="button"> <i class="fa fa-plus" aria-hidden="true"></i> ADD </a>
    </div>
@endsection
