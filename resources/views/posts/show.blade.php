@extends('layouts.app')
@section('title') {{ $post->title }} @endsection
@section('content')
<!-- Page Content -->

<div class="container mb-3">

    <div class="row pt-5">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-5 text-center">{{ $post->title }}</h1>

            <hr>

            <!-- Date/Time -->
            <p class="text-right">Objavljeno: {{ date('d. m. Y', strtotime($post->published_at)) }}</p>

            <hr>

            <!-- Preview Image -->
            @if($post->image)
                <img class="rounded mx-auto d-block post-image"  src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}">
                <hr>
            @endif
            <!-- Post Content -->

            {!! html_entity_decode($post->content) !!}

            <hr>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4 mt-5">

            <!-- Categories Widget -->
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    Kategorije
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($categories as $category)
                        <li class="list-group-item p-2 ">
                            <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>

            <!-- Last Posts Widget -->
            <div class="mt-3">
                <h4>Poslednje Novosti</h4>
                <hr>
                <ul class="list-styled">
                    @foreach($latestPosts as $post)
                    <li class="media mb-3">
                        <img class="d-flex mr-3 rounded" width="64" height="64" src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h5> {{ $post->published_at }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection
