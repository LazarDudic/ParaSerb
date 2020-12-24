@extends('layouts.admin', ['title' => 'Posts'])
@section('head')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('posts.show-posts') }}">Posts</a></li>
            <li class="breadcrumb-item active">{{ isset($post) ? 'Edit post' : 'Add Post' }}</li>
        </ol>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{ isset($post) ? 'Edit Post' : 'Add Post' }}
                    </div>
                    <div class="card-body">
                        @include('partials.message')
                        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($post)) @method('PATCH') @endif

                            <div class="form-group">
                                <label for="name">Title:</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ??  $post->title ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" id="content" rows="6">{{ old('content') ?? $post->content ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload image</label>
                                <input type="file" name="image" value="{{ $post->image ?? old('image') ?? '' }}" class="form-control-file " id="exampleFormControlFile1">
                                @if(isset($post->image))
                                    <img src="{{  asset('storage/' .$post->image) }}" alt="" class="mt-2" height="80" width="100">
                                @endif
                            </div>
                            <select class="custom-select custom-select-sm mb-2 mt-3" name="category_id">
                                    <option selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    @if(isset($post->category->id) && $post->category->id == $category->id)
                                        {{ 'selected' }}
                                    @endif
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="checkbox" value="{{ $post->published_at ?? '' }}"
                                       {{ isset($post->published_at) ? 'checked' : '' }}
                                       name="published_at" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Publish Post
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Add post' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
