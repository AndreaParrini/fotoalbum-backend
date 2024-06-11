@extends('layouts.admin')

@section('content')
    <div class="bg-info py-5">
        <div class="container">
            <h3>All categories</h3>
        </div>
    </div>
    <div class="container py-5">
        <div class="row row-cols-md-2 row-cols-xs-1">
            <div class="col-4">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <h4>Add a new Category</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="helpCategory" placeholder="Sport, Animal, ecc...."
                            value="{{ old('hiddenField') == 'create' ? old('name') : '' }}" />
                        <small id="helpCategory" class="form-text text-muted">Insert name of you new Category</small>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name="hiddenField" value="create">

                    <button type="submit" class="btn btn-info mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>

                    @include('partials.message')

                </form>

            </div>
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-primary align-middle">
                        <thead class="table-light">
                            <caption>
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </caption>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Total Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($categories as $category)
                                <tr class="table-primary">
                                    <td class="text-center" scope="row">{{ $category->id }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.categories.update', $category) }}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <input type="text"
                                                class="form-control @if (old('hiddenField') == $category->id) @error('name', 'nameCategory') is-invalid @enderror @endif"
                                                name="name" id="name" aria-describedby="helpCategory"
                                                placeholder="Sport, Animal, ecc...."
                                                value="{{ old('hiddenField') == $category->id ? old('name', $category->name) : $category->name }}" />

                                            @if (old('hiddenField') == $category->id)
                                                @error('name', 'nameCategory')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            @endif

                                            <input type="hidden" name="hiddenField" value="{{ $category->id }}">
                                        </form>
                                    </td>
                                    <td class="text-center">{{ $category->slug }}</td>
                                    <td class="text-center">item</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.categories.show', $category) }}"><i
                                                class="fa fa-eye me-1" aria-hidden="true"></i>View</a>
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalId--{{ $category->id }}">
                                            <i class="fa fa-trash me-1" aria-hidden="true"></i>Delete
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId--{{ $category->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId--{{ $category->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId--{{ $category->id }}">
                                                            Delete a category
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-wrap">
                                                        You are about to destroy this category :
                                                        <strong>{{ $category->name }}</strong> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                                            method="post">
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
                                <tr>
                                    <span>Attualmente non ci sono categorie gestite</span>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
