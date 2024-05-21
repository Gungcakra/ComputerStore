@extends('layouts.user')
@section('content')
    <div class="container" style="padding-top: 80px;">
        <h1 class="text-center">Product</h1>
        <div class="container-fluid d-flex justify-content-start flex-wrap justify-content-center ">
            @foreach ($products as $product)
                <a href="/detail/{{ $product->id }}" class="card link-underline link-underline-opacity-0 m-2 text-white bg-black bg-opacity-25 border border-warning " style="width: 18rem;">
                    <img src="{{ asset('img/product/' . $product->image_path) }}" class="card-img-top object-fit-contain" width="200px" height="200px">
                    <div class="card-body text-start">
                        <p class="card-text mb-0 text-end">{{ $product->categories->name }}</p>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-text">Rp. {{ $product->price }}</h6>
                        <p class="card-text">{{ Str::limit($product->description, 30, '...') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection