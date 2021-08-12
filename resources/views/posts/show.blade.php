@extends('layouts.app')
@section('title') {{ $post->title }} @endsection
@section('content')
<!-- Page Content -->

<div class="container mb-3">

    <div class="row pt-5">

        <!-- Post Content Column -->
        <div class="col-lg-9 post-container">

            <!-- Title -->
            <h1 class="mt-5 text-center">{{ $post->title }}</h1>

            <hr>

            <!-- Date/Time -->
            <p class="text-right">Objavljeno: {{ date('d. m. Y', strtotime($post->published_at)) }}</p>

            <hr>
            @if($post->image)
                <img class="rounded mx-auto d-block post-image"  src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}">
                <hr>
            @endif

            <!-- Preview Image -->
            {{-- <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. A cupiditate blanditiis autem laborum ipsa. At alias praesentium quis maiores quas, necessitatibus rem error ratione veniam. Delectus aperiam laudantium optio modi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ut, dolorem earum aperiam exercitationem obcaecati reprehenderit 
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quod distinctio non, tempore, consectetur voluptatibus eum mollitia ipsam hic doloremque qui commodi laudantium perspiciatis pariatur esse dolores nobis repudiandae magni. cum blanditiis incidunt rerum labore odit, possimus, expedita id! Suscipit corrupti natus facere atque.
            </div> --}}
            <!-- Post Content -->
            <div class="post-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident cupiditate perspiciatis quas, distinctio vero obcaecati illum repellat alias tempore tempora itaque animi fuga, consectetur quaerat recusandae exercitationem molestias beatae ipsa?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia cupiditate exercitationem porro fuga, nemo delectus aliquid commodi at fugiat eius totam, veritatis vitae provident et eos ex, quisquam praesentium tenetur.
                {!! html_entity_decode($post->content) !!}
            </div>

            @if ($post->galery)
            <div class="row pt-5" style="clear:both;">
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

            <hr>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3 mt-5">

            <!-- Categories Widget -->
            <div class="card text-center">
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
