@extends('layouts.app', ['title' => 'Paragliding Serbia - Paraglajding Srbija'])

@section('content')
<section id="header">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="header-img" src="https://monix.rs/wp-content/uploads/2017/04/Uvac.jpg" alt="">
          </div>
          <div class="carousel-item">
            <img class="header-img" src="https://sites.google.com/site/beautyofnature98/_/rsrc/1482911355882/config/customLogo.gif?revision=1" alt="">
          </div>
          <div class="carousel-item">
            <img class="header-img" src="https://assets.weforum.org/community/image/7TIt0OZ7hNUP1TNJrHHQOCriP9rSR4d9toQR7EB2gU8.jpg" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>

<section id="posts">
    <h1>Novosti</h1>
    <livewire:welcome-posts />
</section>

<section id="galery">
    <div class="container-fluid text-center bg-grey">
         <h1>Galerija</h1> 
        <div class="row text-center">
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Tandem Letovi</strong></h4>
                    <a href="#">
                        <div class="card-img-top"><a href="https://assets.weforum.org/community/image/7TIt0OZ7hNUP1TNJrHHQOCriP9rSR4d9toQR7EB2gU8.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}"></a></div>
                        <i class="fas fa-camera"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Paraglajding</strong></h4>
                    <a href="#">
                        <img class="card-img-top" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}" alt="" height="250">
                        <i class="fas fa-camera"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Takmicenja</strong></h4>
                    <a href="#">
                        <img class="card-img-top" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}" alt="" height="250">
                        <i class="fas fa-camera"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="contact">
    <livewire:contact />
</section>

<div class="d-none ">
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="tandemi"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
</div>
@endsection

@section('scripts')

    <script>
        $("#carousel-slider").carousel({
            interval: 4000
        });

    </script>
@endsection