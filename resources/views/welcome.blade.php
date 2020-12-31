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
    <livewire:contact />
</section>
@endsection
