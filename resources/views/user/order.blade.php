@extends('layouts.user')
@section('content')
<div class="container" style="padding-top: 80px;">
    <h1>Order</h1>
    @if (count($orders)>0)
    @foreach ($orders as $order)
    <div class="card mb-3 w-100 container p-3 bg-black bg-opacity-25 text-white">
      <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
          <img src="{{ asset('img/product/' . $order->products->image_path) }}" class="img-fluid rounded-start" alt="..." width="200px">
        </div>
        <div class="col-9 d-flex flex-column justify-content-center">
                <div class="h-100 d-flex flex-column justify-content-center">
                  <h5 class="card-title">{{ $order->products->name }}</h5>
                    <h6>Quantity: {{ $order->quantity }}</h6>
                    <h6>Rp. {{ number_format($order->total_price / 10, 2, ',', '.') }}</h6>
                    <p class="{{ $order->delivery_status == 'P' ? 'text-warning' :'' }} {{ $order->delivery_status == 'S' ? 'text-success' : '' }} {{ $order->delivery_status == 'C' ? 'text-danger' : '' }}">
                      {{ $order->delivery_status == 'P' ? 'Pending' : '' }} {{ $order->delivery_status == 'S' ? 'Success' : '' }} {{ $order->delivery_status == 'C' ? 'Cancel' : '' }}
                    </p>
                  </div>
                  <p class="text-end w-100 pe-3">{{ $order->created_at->format('Y-m-d') }}</p>
                  <a href="/ordertopdf/{{ $order->id }}" class="btn btn-warning">Export Receipt</a>
  
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p>Wow, it looks like your items are still left in your cart, let's order now</p>
            @endif
          </div>
@endsection