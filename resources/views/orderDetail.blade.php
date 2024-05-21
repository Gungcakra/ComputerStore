<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-fluid bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="col-6 bg-white text-center rounded-3 shadow-sm">
            <div class="container">
                <img src="{{ asset('img/logo.png') }}" alt="" width="200px">
                <p class="m-0">{{ $order->created_at }}</p>
                <hr>
                <div class="text-start">
                    <h6 class="">Detail Customer</h6>
                    <div class="row">
                        <div class="col-6 mb-1">Nama</div>
                        <div class="col-6 text-end">{{ $order->users->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">Email</div>
                        <div class="col-6 text-end">{{ $order->users->email }}</div>
                    </div>
                    <h6 class="mt-3">Detail Transaksi</h6>
                    <div class="row">
                        <div class="col-6 mb-1">Product</div>
                        <div class="col-6 text-end">{{ $order->products->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">Quantity</div>
                        <div class="col-6 text-end">{{ $order->quantity }} / pcs</div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">Price</div>
                        <div class="col-6 text-end">Rp. {{ number_format($order->products->price / 10, 2, ',', '.') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">Payment Method</div>
                        <div class="col-6 text-end">{{ $order->payment_method }}</div>
                    </div>
                </div>
                <div class="row bg-primary text-white pb-1 pt-2 mt-2 rounded-bottom-3">
                    <h6 class="col-6 text-start">Total Price</h6>
                    <h6 class="col-6 text-end">Rp. {{ number_format($order->total_price / 10, 2, ',', '.') }}</h6>
                </div>
            </div>
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>   
</body>

</html>




