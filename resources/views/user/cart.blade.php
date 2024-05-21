@php
  $totalPrice = 0;
@endphp
@extends('layouts.user')
@section('content')
<div class="container" style="padding-top: 80px;">
    <h1>Cart</h1>
    @if (count($carts) > 0)
        <p>Oh no! Your cart is empty. It's time to fill with shopping happiness.</p>
    @foreach ($carts as $cart)
        @php
          $totalPrice += $cart->products->price * $cart->quantity;
        @endphp
        <div class="card mb-3 w-100 container p-3 bg-black bg-opacity-25 text-white">
            <div class="row">
              <div class="col-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/product/' . $cart->products->image_path) }}" class="img-fluid rounded-start" alt="..." width="200px">
              </div>
              <div class="col-9 d-flex flex-column justify-content-center">
                <div class="h-100 d-flex flex-column justify-content-center">
                    <h5 class="card-title">{{ $cart->products->name }}</h5>
                    <h6>Quantity: {{ $cart->quantity }}</h6>
                    <h6>Rp. {{ number_format($cart->products->price * $cart->quantity,0, ',', '.') }}</h6>
                </div>
                <form action="{{ url('/deletecart') }}" method="POST" class="d-flex justify-content-end">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $cart->id }}">
                    <a href="{{ url('checkout/'.$cart->id) }}" class="btn btn-primary p-1 ps-3 pe-3 me-1"><i class="fa-solid fa-check"></i></a>
                    <button type="submit" class="btn btn-danger p-1 ps-3 pe-3"><i class="fa-solid fa-xmark"></i></button>
                </form>
              </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Oh no! Your cart is empty. It's time to fill with shopping happiness.</p>
    @endif

    <form action="/checkout" method="post" class="{{ count($carts) == 0? 'd-none' : 'd-block' }}">
      @csrf
      <hr>
      <div class="row">
        <div class="col-2">
            Total Price
        </div>
        <div class="col-10">
          Rp. {{ number_format($totalPrice,0, ',', '.') }}
        </div>
      </div>
      <div class="row">
        <div class="col-2">
            Payment Method
        </div>
        <div class="col-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="COD (Cash On Delivery)" checked>
                <label class="form-check-label" for="inlineRadio1"><i class="fa-solid fa-money-bill"></i> COD (Cash On Delivery)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="Bank Transfer">
                <label class="form-check-label" for="inlineRadio2"><i class="fa-solid fa-money-check-dollar"></i> Bank Transfer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio3" value="E-Wallet">
                <label class="form-check-label" for="inlineRadio3"><i class="fa-solid fa-wallet"></i> E-Wallet</label>
            </div>
        </div>
      </div>
      <div class="form-floating mt-2 mb-2">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="address" required></textarea>
        <label for="floatingTextarea2" class="text-black">Address</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Checkout All</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::get('success'))
<script>
  Swal.fire({
    title: "Checkout success",
    text: "You can see it on the order page",
    icon: "success"
  });
</script>
@endif
@endsection