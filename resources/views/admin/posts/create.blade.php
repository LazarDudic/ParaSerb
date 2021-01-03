@extends('layouts.admin', ['title' => 'Posts'])
@section('head')
    <script src="https://cdn.tiny.cloud/1/n63k1bhpjawumspwwbxxciuhly63p6db2n7ft3vkhdrdz6n0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ??  $post->title ?? '' }}">
                                @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="15">{{ old('content') ?? $post->content ?? '' }}</textarea>
                                @error('content')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload image</label>
                                <input type="file" name="image" value="{{ $post->image ?? old('image') ?? '' }}" class="form-control-file @error('category_id') is-invalid @enderror" id="exampleFormControlFile1">
                                @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                            @if(isset($post->image))
                                    <img src="{{  asset('storage/' .$post->image) }}" alt="" class="mt-2" height="80" width="100">
                                    <a href="{{ route('posts.remove-image', $post->id) }}" style="font-size: 0.8rem">
                                        Remove Image
                                    </a>
                                @endif
                            </div>
                            <div class="form-group">
                                <select class="custom-select custom-select-sm mb-2 mt-3 @error('category_id') is-invalid @enderror" name="category_id">
                                    <option disabled selected>Choose Category</option>
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
                                @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                            </div>


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
@section('script')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link | codesample',
            toolbar: 'codesample | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent link',

        });
    </script>

@endsection
