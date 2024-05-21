@extends('layouts.user')
@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    {{-- <div class="container d-flex">
        <img src="{{ url('img/products/'.$product->image_path) }}" alt="" class="rounded-2 object-fit-cover" width="400px" height="400px">
        <div class="d-flex align-items-center container">
            <div class="bg-white shadow-sm ms-3 p-3 rounded-2 w-100">
                <h1>{{ $product->name }}</h1>
                <p class="m-0">{{ $product->description }}</p>
                <p class="m-0">Stock: {{ $product->stock }}</p>
                <p>Price: Rp. {{ $product->price }} / pcs</p>
                <form action="{{ url('/cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="d-flex mb-2">
                        <button type="button" class="btn btn-light rounded-end-0 border-1 border-light-subtle" id="btn-minus">-</button>
                        <input type="text" class="form-control text-center rounded-0 bg-white border-0 border-top border-bottom border-light-subtle" style="width: 60px;" id="quantity" name="quantity" value="1" readonly>
                        <button type="button" class="btn btn-light rounded-start-0 border-1 border-light-subtle" id="btn-plus">+</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="container row align-items-center">
        <div class="col col-lg-4">
            <img src="{{ url('img/product/'.$product->image_path) }}" alt="" class="rounded-2 object-fit-contain" width="300px" height="300px">
        </div>
        <div class="col col-lg-8 p-0">
            <div class="shadow p-3 rounded-2 w-100 bg-black bg-opacity-25">
                <h1>{{ $product->name }}</h1>
                <p class="m-0">{{ $product->description }}</p>
                <p class="m-0">Stock: {{ $product->stock > 0 ? $product->stock : 'Unavaible'  }}</p>
                <p>Price: Rp. {{ $product->price }} / pcs</p>
                <form action="{{ url('/cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="d-flex mb-2">
                        <button type="button" class="btn btn-light rounded-end-0 border-1 border-light-subtle" id="btn-minus">-</button>
                        <input type="text" class="form-control text-center rounded-0 bg-white border-0 border-top border-bottom border-light-subtle" style="width: 60px;" id="quantity" name="quantity" value="1" readonly>
                        <button type="button" class="btn btn-light rounded-start-0 border-1 border-light-subtle" id="btn-plus">+</button>
                    </div>
                    <button type="submit" class="btn btn-warning"  {{ $product->stock <= 0 ? 'disabled' : '' }}>Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="toast position-fixed end-0 bottom-0 bg-dark" role="alert" aria-live="assertive" aria-atomic="true">

    <div class="toast-header">
      <img src="{{ url('img/user.jpg') }}" class="rounded-circle me-2" alt="..." width="20px">
      <strong class="me-auto">ComputerStore</strong>
      <small class="text-body-secondary">Just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      {{ $message }}
    </div>
</div>
@endif
  
<script src="{{ url('js/quantity.js') }}"></script>
<script src="{{ url('js/toast.js') }}"></script>
@endsection