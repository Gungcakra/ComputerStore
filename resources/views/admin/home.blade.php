@extends('layouts.adminmain')
@section('content')
<div class="container content-wrapper">
   
        <h1 class="text-white">Admin Page</h1>
        <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-computer" style="color: #ffffff;"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Product Total</span>
                      <span class="info-box-number">
                        {{ $product->count() }}
                        <small>Product</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-hand-holding-dollar" style="color: #ffffff;"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Income</span>
                      <span class="info-box-number">
                        {{ 'Rp '.number_format($order->sum('total_price'), 0, ',', '.') }}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Sales</span>
                      <span class="info-box-number">
                        {{ $order->count() }}
                        <small>Sales</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">New Customer</span>
                      <span class="info-box-number">
                        {{ $user->count() }}
                        <small>Customer</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
</div>
@endsection