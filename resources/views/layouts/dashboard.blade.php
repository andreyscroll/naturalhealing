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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Панель управления</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('dashboard.product.index') }}">Товары</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Блог</a>--}}
{{--                    </li>--}}

                </ul>
            </div>
        </div>
    </nav>

    <section class="main mb-5">
        <div class="container">

            <div class="row">
                <div class="col-md-3">

                    <h3>Товары</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.product.index') }}">Все товары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.product.category.index') }}">Категории</a>
                        </li>
                    </ul>

                    <h3>Блог</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.blog.index') }}">Все посты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.blog.create') }}">Добавить запись</a>
                        </li>
                    </ul>

                    <h3>Страницы</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Все страницы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Добавить страницу</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-9">
                    @if (session()->has('success'))
                        <div class="alert alert-success my-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('main')
                </div>
            </div>

        </div>
    </section>

    <section class="footer text-center bg-light p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
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
