@extends('layouts.admin', ['title' => 'Posts'])

@section('content')


    <div class="container">
        <h1 class="mt-4">Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
            <li class="breadcrumb-item active"></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Posts
                <a href="{{ route('posts.create') }}" class="btn btn-success float-right">Add Post</a>

            </div>

            <div class="card-body">
                @include('partials.message')
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tittle</th>
                            <th>Content</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Publish</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ substr($post->content, 0,30)  }}</td>
                                <td>{{ $post->slug }}</td>
                                <td><img src="{{  asset('storage/' .$post->image) }}" alt="" height="80" width="100"></td>
                                <td>
                                    <form action="{{ route('post.publish', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $post->published_at ? 'btn-secondary' : 'btn-success' }}">
                                            {{ $post->published_at ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn" >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


