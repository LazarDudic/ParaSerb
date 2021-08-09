<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />



    <title>
        @if(isset($title))
            {{ $title }}
        @else
            @yield('title')
        @endisset
    </title>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-custom">
    <a class="navbar-brand" href="/">Paragliding Serbia</a>
    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto pr-5">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('all-categories') }}">Novosti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tandemi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#galery">Galerija</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">Kontakt</a>
            </li>
        </ul>
        {{-- <form>
            <input class="form-control w-75" type="search" placeholder="Search" aria-label="Search">
        </form> --}}
    </div>
</nav>


@yield('content')

<section id="footer">
    &copy;  {{ date('Y') }} Paragliding Serbia
</section>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

@livewireScripts
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@yield('scripts')

<script>
    $( window ).scroll(function() {
        console.log($(window).scrollTop())
        if($(window).height() < 1) {
            $( ".bg-custom" ).css("background-color", "rgb(0 0 0 / 75%)");
        } else {
            $( ".bg-custom" ).css("background-color", "rgb(0 0 0 / 90%)");
        }
    });
});
</script>
</html>

