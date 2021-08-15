@extends('layouts.app')

@section('title') @endsection
@section('content')

    <!-- Page Content -->
    <div class="container mt-5 ">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 col-12">

                <h1 class="py-4">
                    {{ $categoryName ?? 'Novosti' }}
                </h1>

                <div class="container">
                <!-- Blog Post -->
                @forelse($posts as $post)
                    <div class="border row rounded mb-4 pt-2">
                        <div class="col-lg-5 col-md-4 col-12 pb-1">
                            <img style="width: 100%; max-height: 220px" src="{{ getImage($post->image) }}" alt="Card image cap">
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <h5>{{ $post->title }}</h5>
                            <p>{!! substr(strip_tags($post->content), 0, 70) !!}...</p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center border-top p-1">
                            <p class="mb-0">Objavljeno: {{ date('d. m. Y', strtotime($post->published_at)) }}</p>    
                            <a  href="{{ route('posts.show', $post->slug) }}" " class="btn-sm contact-button">Procitaj &rarr;</a>
                        </div>
                    </div>
                @empty
                    <h1>Još nema postova u ovoj kategoriji :(</h1>
                @endforelse
                </div>
                <div class="d-flex justify-content-center">
                <!-- Pagination -->
                {{ $posts->links() }}
                </div>
            </div>



            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 mt-5">
                    <!-- Categories Widget -->
                    <div class=" text-center">
                        <h5 class="">
                            Kategorije
                        </h5>
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
                <div class="mt-3 border p-2">
                    <h5 class="text-center">Poslednje</h5>
                    <hr>
                    <ul class="list-styled">
                        @foreach($latestPosts as $post)
                            <li class="media mb-3">
                                <img class="d-flex mr-3 rounded" width="64" height="64" src="{{ getImage($post->image) }}" alt="{{ $post->title }}">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"><a style="text-decoration: none" href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h6> {{ date('d. m. Y', strtotime($post->published_at)) }}
                                </div>
                            </li>
                            @if (!$loop->last)<hr> @endif
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
