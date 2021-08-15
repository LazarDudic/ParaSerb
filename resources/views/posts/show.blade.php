@extends('layouts.app')
@section('title') {{ $post->title }} @endsection
@section('content')
<!-- Page Content -->

<div class="container mb-3">

    <div class="row pt-5">

        <!-- Post Content Column -->
        <div class="col-lg-8 post-container">

            <!-- Title -->
            <h1 class="pt-4 text-center post-title">{{ $post->title }}</h1>            <!-- Date/Time -->
            <p class="border-top border-bottom text-right">Objavljeno: {{ date('d. m. Y', strtotime($post->published_at)) }}</p>

            @if($post->image)
                <img class="rounded post-image"  src="{{ getImage($post->image) }}" alt="{{ $post->title }}">
            @endif

            <!-- Preview Image -->

            <!-- Post Content -->
            <div class="post-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident cupiditate perspiciatis quas, distinctio vero obcaecati illum repellat alias tempore tempora itaque animi fuga, consectetur quaerat recusandae exercitationem molestias beatae ipsa?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia cupiditate exercitationem porro fuga, nemo delectus aliquid commodi at fugiat eius totam, veritatis vitae provident et eos ex, quisquam praesentium tenetur.
                {!! html_entity_decode($post->content) !!}
            </div>

            @if ($post->galery)
            
            <div class="row pt-3" style="clear:both;">
                @forelse (json_decode($post->galery) as $photo)
                    <div class="col-xl-4 col-md-6  col-sm-12 post-galery mb-2">
                        <a href="{{ $photo }}" data-lightbox="galery">
                            <img class="img-fluid" src="{{ $photo }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            @endif


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4 mt-5">

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
                <h6 class="text-center">Poslednje</h6>
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
