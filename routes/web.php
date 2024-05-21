<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', [AuthController::class, 'loginView'])->name('login');
Route::get('/',function(){
    return view('index',[
        'title'=> 'ComputerShop',
        'fproduct'=>Product::class::paginate(4),
        'nproduct'=>Product::class::latest()->paginate(8)

    ]);
});

// Route Auth View
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::get('/login', [AuthController::class, 'loginView'])->name('login');

// Route Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route User View
Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/cart', [UserController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('/order', [UserController::class, 'order'])->name('order')->middleware('auth');
Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail')->middleware('auth');
Route::get('/checkout/{id}', [UserController::class, 'checkoutView'])->name('checkout')->middleware('auth');
Route::get('/ordertopdf/{id}', [UserController::class, 'orderDetail'])->name('orderDetail')->middleware('auth');

// Route User
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/profile', [UserController::class, 'updateProfile']);
Route::post('/cart', [UserController::class, 'addCart']);
Route::post('/deletecart', [UserController::class, 'deleteCart']);
Route::post('/checkout', [UserController::class, 'checkout']);
Route::post('/checkoutsingle', [UserController::class, 'checkoutsingle']);


// Admin Route
Route::get('/homeadmin', function () {
    return view('admin.home',[
        'title'=>'Admin Homepage',
        'product' => Product::all(),
        'user'=>User::all(),
        'order'=>Order::all()
    ]);
});
route::get('adminuser', function () {

    return view('admin.user',[
        'title'=> 'Manage User',
        'data'=>User::paginate(20)
        ]);

    })->name('admin.user');

// Product
route::get('/adminproduct',[ProductController::class,'index'])->name('admin.product');
Route::post('/storeproduct', [ProductController::class,'storeproduct'])->name('storeproduct');
Route::get('/deleteproduct/{id}', [ProductController::class,'deleteproduct'])->name('feleteproduct');
Route::get('/editproduct/{id}', [ProductController::class,'editproduct'])->name('editproduct');
Route::post('/updateproduct/{id}', [ProductController::class,'updateproduct'])->name('updateproduct');
Route::get('/filterproduct',[ProductController::class,'filterproduct'])->name('filterproduct');
// Order,[]
Route::get('/adminorder', [OrderController::class,'index'])->name('adminorder');
Route::get('/editorder/{id}', [OrderController::class,'editorder'])->name('editorder');
Route::get('/filterorderdate',[OrderController::class,'filterorderdate']);
// Cashflow
Route::get('/admincashflow',[CashflowController::class,'index'])->name('cashflow');
Route::post('/cashflowadd',[CashflowController::class,'cashflowadd'])->name('cashflowadd');
Route::get('/filtercashflow',[CashflowController::class,'filtercashflow'])->name('filtercashflow');