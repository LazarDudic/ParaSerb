@extends('layouts.admin', ['title' => 'Categories'])

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('categories.show-categories') }}">Categories</a></li>
            <li class="breadcrumb-item active">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</li>
        </ol>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{ isset($category) ? 'Edit Category' : 'Add Category' }}
                    </div>

                    <div class="card-body">
                        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                            @csrf
                            @if(isset($category)) @method('PATCH') @endif

                            <div class="form-group">
                                <label for="name">Category Name:</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ $category->name ?? '' }}">
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Add Category' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
