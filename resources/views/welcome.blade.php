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

<section id="posts" class="pt-3">
    <livewire:welcome-posts />
</section>

<section id="galery">
    <span class="anchor" id="galery-scroll"></span>
    <div class="container-fluid text-center bg-grey py-4">
        <div class="row text-center">
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Tandem Letovi</strong></h4>
                    <div class="card-img-top">
                        <a href="https://assets.weforum.org/community/image/7TIt0OZ7hNUP1TNJrHHQOCriP9rSR4d9toQR7EB2gU8.jpg" data-lightbox="takmicenja">
                            <img class="img-fluid" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}">
                            <i class="fas fa-camera"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Paraglajding</strong></h4>
                    <div class="card-img-top">
                        <a href="https://assets.weforum.org/community/image/7TIt0OZ7hNUP1TNJrHHQOCriP9rSR4d9toQR7EB2gU8.jpg" data-lightbox="takmicenja">
                            <img class="img-fluid" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}">
                            <i class="fas fa-camera"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Takmicenja</strong></h4>
                        <div class="card-img-top">
                            <a href="https://assets.weforum.org/community/image/7TIt0OZ7hNUP1TNJrHHQOCriP9rSR4d9toQR7EB2gU8.jpg" data-lightbox="takmicenja">
                                <img class="img-fluid" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}">
                                <i class="fas fa-camera"></i>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="video">
    <span class="anchor" id="video-scroll"></span>
    <h1>Video</h1>
<!-- Grid row -->
<div class="row">
    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-4">
  
      <!--Modal: Name-->
      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Body-->
            <div class="modal-body mb-0 p-0">
              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A3PDXmYoF5U"
                  allowfullscreen></iframe>
              </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: Name-->
      <a><img class="img-fluid z-depth-1 video-hover" src="https://mdbootstrap.com/img/screens/yt/screen-video-1.jpg" alt="video"
          data-toggle="modal" data-target="#modal1"></a>
    </div>
    <!-- Grid column -->
  
    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 mb-4">
      <!--Modal: Name-->
      <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Body-->
            <div class="modal-body mb-0 p-0">
              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wTcNtgA6gHs"
                  allowfullscreen></iframe>
              </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: Name-->
      <a><img class="img-fluid z-depth-1 video-hover" src="https://mdbootstrap.com/img/screens/yt/screen-video-2.jpg" alt="video"
          data-toggle="modal" data-target="#modal6"></a>
    </div>
    <!-- Grid column -->
  
    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 mb-4">
      <!--Modal: Name-->
      <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Body-->
            <div class="modal-body mb-0 p-0">
              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half rounded">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vlDzYIIOYmM"
                  allowfullscreen></iframe>
              </div>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Content-->
  
        </div>
      </div>
      <!--Modal: Name-->
  
      <a><img class="img-fluid z-depth-1 video-hover" src="https://mdbootstrap.com/img/screens/yt/screen-video-3.jpg" alt="video"
          data-toggle="modal" data-target="#modal4"></a>
  
    </div>
    <!-- Grid column -->
  
  </div>
  <!-- Grid row -->
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
</div>
<div class="d-none ">
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="paragliding"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
</div>
<div class="d-none ">
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
    <div class="item"><a href="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg" data-lightbox="takmicenja"><img class="img-fluid" src="https://i.pinimg.com/originals/c4/76/27/c476278504682e622fabe9b0932098c3.jpg"></a></div>
</div>
@endsection

@section('scripts')

    <script>
        $("#carousel-slider").carousel({
            interval: 4000
        });
        $(document).scroll(function () {
            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    </script>
@endsection