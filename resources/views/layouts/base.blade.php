<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto+Slab:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    <section class="logo">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <img src="{{ asset("assets/img/logo.png") }}" alt="" class="mt-3">
                        <a href="{{ route('home') }}" class="logo_link">NaturalHealing</a>
                        <p class="logo_desc">Природное исцеление</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-menu my-4">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <nav class="navbar navbar-expand-lg navbar-light bg-green px-3">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                                </li>
                                @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product.category', ['slug' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blog.index') }}">Блог</a>
                                </li>

                            </ul>
                            <form method="GET" action="{{ route('search.show') }}" class="d-flex">
                                <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </section>

    @error('q')
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
            </div>
        </div>
    @enderror

    <section class="main mb-5">
        <div class="container">
            @yield('main')
        </div>
    </section>

    <section class="footer text-center bg-light p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="bottom-menu">
                        <ul class="list-unstyled">
                        @foreach($pages as $page)
                            <li class="d-inline-flex">
                                <a class="text-secondary" href="{{ route('page.show', ['slug' => $page->slug]) }}">
                                    {{ $page->name }}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="copyright">
                        <p>&copy; Copyright 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
