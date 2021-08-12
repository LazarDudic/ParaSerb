<div>
    <div class="container">
        <div class="row">

            <div class="col-12 mt-2 d-flex justify-content-center sort">
                <select class="custom-select mb-3 select-category" wire:model="category">
                    <option value="0" selected>Sve Kategorije</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
                <select class="custom-select mb-3 ml-2 new-old" wire:model="sortDirection">
                    <option value="desc">Novije</option>
                    <option value="asc">Starije</option>
                </select>
            </div>

            @foreach($posts as $post)

                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <a href="{{ route('posts.show', $post->slug) }}"><img class="card-img-top" src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}" height="250"></a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h5>
                            <p class="card-text date"><small class="text-muted">{{ date("d.m.Y", strtotime($post->created_at)) }}</small></p>
                        </div>
                    </div>
                </div>



            @endforeach
        </div>
    </div>
    <div class="see-more">
        @if($posts->count() == $paginate)
            <button class="btn" wire:click="seeMore(3)">Pogledaj još >></button>
        @else
            <p>Nema više postova.</p>
        @endif
    </div>


</div>
