<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        
        
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="{{ asset('img/index/logo 2.png') }}">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </nav>
                <img src="{{ asset('img/index/cart 2.png') }}" width="30px" height="30px">
                <img src="{{ asset('img/index/menu.png') }}" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1><span>Unlock</span> Your <br> Best  <span>Skills!!</span></h1>
                    <p style="color: white;">increase your skills to the maximum level <br> by using the best gaming equipment from us!</p>
                    <a href="#featured" class="btn">Explore Now! &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="{{ asset('img/index/image1.png') }}">
                </div>
            </div>
        </div>

    </div>

    <!-- ------------------------------------ FEATURED CATEGORIES --------------------------------------- -->
    
    <div class="categories">
        <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('img/index/category-1.jpg') }}">
            </div>
            <div class="col-3">
                <img src="{{ asset('img/index/category-2.jpg') }}" alt="">
                
            </div>
            <div class="col-3">
                <img src="{{ asset('img/index/category-3.jpg') }}" alt="">
                
            </div>
        </div>
    </div>
</div>

<!-- ------------------------------------ FEATURED Products --------------------------------------- -->
<div class="small-container" id="featured">
    <h2 class="title">Featured Product</h2>
    <div class="row">
        @foreach($fproduct as $fp)
            
        <div class="col-4" id="card-product">
            <img src="{{ asset('img/product/'. $fp->image_path) }}">
            <h4>{{ $fp->name }}</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
            </div>
            <p>{{'Rp ' . number_format($fp->price,0, ',', '.')  }}</p>
        </div>
        @endforeach
    </div>
    
    <h2 class="title">Produk Terbaru</h2>
    <div class="row">
        @foreach($nproduct as $np)
            
        <div class="col-4">
            <img src="{{ asset('img/product/' . $np->image_path) }}">
            <h4>{{ $np->name }}</h4>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
            </div>
            <p>{{ 'Rp ' . number_format($np->price,0,',','.') }}</p>
        </div>
        @endforeach
        
    </div>
</div>

<!-- ------------------------------------------ Offer ---------------------------------------------- -->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('img/product/cyberpowerpc_gamer_xtreme.png') }}" class="offer-img">
            </div>
            <div class="col-2">
                <p>LIMITED EDITION!! Exclusively Available on BS Store!!</p>
                <h1>Custom Made. High-End Gaming Machine</h1>
                <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, libero? Omnis mollitia quia ratione similique quas perspiciatis corrupti repudiandae eveniet iste illum, maxime eligendi neque porro, impedit
                </small>
                <a href="#" class="btn-below">Buy Now! &#8594;</a>
            </div>
        </div>
    </div>
</div>

<!-- -------------------------- Testimony ----------------------------------- -->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus eum repellendus voluptatem sunt odio alias. Sed eaque dolores ea eum ad totam</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <img src="image cadangan/user-1.png" alt="">
                <h3>Diana</h3>
            </div>
            <div class="col-3">
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus eum repellendus voluptatem sunt odio alias. Sed eaque dolores ea eum ad totam</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <img src="image cadangan/user-2.png" alt="">
                <h3>Asep</h3>
            </div>
            <div class="col-3">
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus eum repellendus voluptatem sunt odio alias. Sed eaque dolores ea eum ad totam</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <img src="image cadangan/user-3.png" alt="">
                <h3>Dinda</h3>
            </div>
        </div>
    </div>
</div>

<!-- -------------------------------- Brands -------------------------------- -->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="image cadangan/logo-godrej.png" alt="">
            </div>
            <div class="col-5">
                <img src="image cadangan/logo-coca-cola.png" alt="">
            </div>
            <div class="col-5">
                <img src="image cadangan/logo-oppo.png" alt="">
            </div>
            <div class="col-5">
                <img src="image cadangan/logo-paypal.png" alt="">
            </div>
            <div class="col-5">
                <img src="image cadangan/logo-philips.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- ------------------------- footer -------------------------------- -->
<div class="footer">

    <div class="container">
        <div class="row">
            <img src="{{ asset('img/index/logo 2.png') }}" alt="">
        </div>
        <div class="row">
            <br>
        </div>
        <div class="row">
            <h1 class="text-center">Copyright 2023 - Computer Shop</h1>
        </div>
    </div>


    {{-- <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App!</h3>
                <p>Download Our App for Android & IOS</p>
                <div class="app-logo">
                    <img src="image cadangan/play-store.png" alt="">
                    <img src="image cadangan/app-store.png" alt="">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="{{ asset('img/index/logo 2.png') }}" alt="">
                <p>Our Purpose Is TO Sustainably Make the Pleasure and Benefits of Gaming Accessible to the Many.</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us!</h3>
                <ul>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Youtube</li>
                    <li>Facebook</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2023 - Computer Shop</p>
    </div> --}}
</div>

<!--  JS For Toggle Menu -->
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle(){
        if (MenuItems.style.maxHeight == "0px") 
        {
            MenuItems.style.maxHeight = "200px";
        }
        else 
        {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
<script src="https://kit.fontawesome.com/3b62d67847.js" crossorigin="anonymous"></script>

</body>
</html>
