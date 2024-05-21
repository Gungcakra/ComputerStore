<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ComputerStore - {{ $titlePage }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    {{-- Style --}}
    <style>*{font-family: 'Poppins', sans-serif;}</style>
</head>
<body>
    <div class="vh-100 w-100 position-fixed z-n1">
        <div class="col-lg-5 bg-dark h-100"></div>
        <div class="col-7 h-100"></div>
    </div>

    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row rounded-3 overflow-hidden h-75 w-100 shadow">
            <div class="col-6 bg-dark d-none d-lg-flex justify-content-center align-items-center">
                <img src="{{ url('img/login.png') }}" alt="" width="400px">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center bg-white">
                <div class="p-2 p-lg-5">
                    <div class="text-center mb-4">
                        <h3 class="text-gray-900">Login Here!</h3>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                    </div>
                    <form class="user" action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-user me-2"></i><input type="email" class="form-control form-control-user @error('email') is-invalid @enderror shadow-sm rounded-5" id="exampleInputEmail"
                                placeholder="Example@gmail.com" name="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-lock me-2"></i><input type="password" class="form-control form-control-user @error('password') is-invalid @enderror shadow-sm rounded-5"
                                id="exampleInputPassword" placeholder="********" name="password" value="{{ old('password') }}" required>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <button type="submit" class="btn btn-warning rounded-5">
                                    Login <i class="fa-solid fa-arrow-right-long ms-1"></i>
                                </button>
                            </div>
                            <div class="col-12 col-md-6 mt-3 mt-md-0 d-flex align-items-center">
                                <a class="small text-decoration-none text-md-end w-100 text-warning" href="{{ url('/register') }}">Create an Account!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>