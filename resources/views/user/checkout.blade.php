@extends('layouts.user')
@section('content')
<div class="container" style="padding-top: 80px;">
    <h3>Checkout Detail</h3>
    <form action="/checkoutsingle" method="post">
      @csrf
      <img src="{{ asset('img/product/' . $cart->products->image_path) }}" class="img-fluid rounded-start" alt="..." width="200px">
        <div class="row mt-2">
            <div class="col-2">
                Product Name
            </div>
            <div class="col-10">
                {{ $cart->products->name }}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                Amount
            </div>
            <div class="col-10">
                {{ $cart->quantity }}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                Price / pcs
            </div>
            <div class="col-10">
                Rp. {{ number_format($cart->products->price / 10, 2, ',', '.') }}
            </div>
        </div>
        <div class="row mt-2">
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
        <h3 class="mt-4">Payment Detail</h3>
        <div class="row mt-2">
            <div class="col-2">
                Product Total
            </div>
            <div class="col-10">
                Rp. {{ number_format($cart->products->price * $cart->quantity / 10, 2, ',', '.') }}
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                Delivery Total
            </div>
            <div class="col-10">
                Free
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                Total
            </div>
            <div class="col-10">
                Rp. {{ number_format($cart->products->price * $cart->quantity / 10, 2, ',', '.') }}
            </div>
        </div>
        <div class="form-floating mt-2 mb-2">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="address" required></textarea>
            <label for="floatingTextarea2">Address</label>
        </div>
      <input type="hidden" name="id" value="{{ $cart->id }}">
      <button type="submit" class="btn btn-primary w-100">Checkout</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection