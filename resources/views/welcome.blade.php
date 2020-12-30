@extends('layouts.app', ['title' => 'Paragliding Serbia'])

@section('content')
<section id="header">
    <img class="header-img" src="https://monix.rs/wp-content/uploads/2017/04/Uvac.jpg" alt="">
</section>

<section id="posts">
    <h1>Novosti</h1>
    <livewire:welcome-posts />
</section>
<section id="galery">
    <div class="container-fluid text-center bg-grey">
        <!-- <h1>Galery</h1> -->
        <div class="row text-center">
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail">
                    <h4><strong>Tandem Letovi</strong></h4>
                    <a href="#">
                        <img class="card-img-top" src="https://source.unsplash.com/random/201x20{{ rand(0, 9)}}" alt="" height="250">
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="contact-title">Kontakt</h2>
                <i class="fas fa-phone-volume" aria-hidden="true">+3816412345678</i>
                <ul class="contact-icons">
                    <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Ime *" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Email *" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Broj telefona" required />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Vaša poruka *" rows="5" required></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Pošalji</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
