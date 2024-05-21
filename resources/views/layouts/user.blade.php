<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ComputerStore - {{ $titlePage }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
</head>
<body class="bg-dark text-white">
{{-- <nav class="navbar navbar-expand bg-light position-fixed w-100 z-1 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">ComputerStore</a>
        <div class="collapse navbar-collapse d-flex justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ url('img/user.jpg') }}" alt="user.jpg" width="30" class="rounded-circle shadow-sm">
            </a>
            <ul class="dropdown-menu" style="margin-left: -95px;">
                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa-solid fa-user"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                <li><a class="dropdown-item" href="{{ url('/order') }}"><i class="fa-solid fa-truck"></i> Order</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <li><button type="submit" class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></li>
                </form>
            </ul>
            </li>
        </ul>
        </div>
    </div>
</nav> --}}
<nav class="navbar navbar-expand-lg bg-dark bg-opacity-75 navbar-dark position-fixed shadow w-100 z-1">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}">ComputerStore</a>
      <button class="navbar-toggler rounded-circle p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ url('img/user.jpg') }}" alt="user.jpg" width="30px" class="rounded-circle shadow-sm">
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-none">
            <li class="nav-item">
                <a class="nav-link {{ $titlePage == 'Profile' ? 'active' : '' }}" aria-current="page" href="{{ url('/profile') }}"><i class="fa-solid fa-user"></i> Profile</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link {{ $titlePage == 'Cart' ? 'active' : '' }}" href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $titlePage == 'Order' ? 'active' : '' }}" href="{{ url('/order') }}"><i class="fa-solid fa-truck"></i> Order</a>
            </li>
            <hr>
            <form action="{{ url('logout') }}" method="post">
                @csrf
                <li><button type="submit" class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></li>
            </form>
        </ul>
        <ul class="navbar-nav d-none d-lg-flex justify-content-end w-100">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }} <img src="{{ url('img/user.jpg') }}" alt="user.jpg" width="30" class="rounded-circle shadow-sm">
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa-solid fa-user"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                <li><a class="dropdown-item" href="{{ url('/order') }}"><i class="fa-solid fa-truck"></i> Order</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <li><button type="submit" class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></li>
                </form>
            </ul>
            </li>
        </ul>
      </div>
    </div>
</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>