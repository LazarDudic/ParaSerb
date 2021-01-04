@extends('layouts.app')

@section('title') @endsection
@section('content')

    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">
                    {{ $categoryName ?? 'Novosti' }}
                </h1>

                <!-- Blog Post -->
                @forelse($posts as $post)
                    <div class="card mb-4">
                        <img class="card-img-top post-image" height="300" src="{{ asset('storage/' .$post->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{!! substr($post->content, 0, 100) !!}...</p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Objavljeno: {{ date('d. m. Y', strtotime($post->published_at)) }}
                        </div>
                    </div>
                @empty
                    <h1>Još nema postova u ovoj kategoriji :(</h1>
                @endforelse
                <!-- Pagination -->
                {{ $posts->links() }}
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
