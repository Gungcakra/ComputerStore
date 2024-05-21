<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cashflow;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
class UserController extends Controller
{
    // GET Function
    public function home()
    {
        $products = Product::with('categories');

        if (request('search')) {
            $products->where('name', 'like', '%' . request('search') .'%');
        }

        $products = $products->get();
        foreach($products as $product){
            $product["price"] = number_format($product["price"] / 10, 2, ',', '.');
        }

        return view('user.home', [
            'titlePage' => 'Home',
            'products' => $products
        ]);
    }
    public function profile()
    {
        return view('user.profile', [
            'titlePage' => 'Profile'
        ]);
    }
    public function cart()
    {
        $carts = Cart::with('users', 'products')->where('user_id', auth()->user()->id);
        $carts = $carts->get();
        return view('user.cart', [
            'titlePage' => 'Cart',
            'carts' => $carts
        ]);
    }
    public function order()
    {
        $orders = Order::with('users', 'products')->where('user_id', auth()->user()->id);
        $orders = $orders->get();
        return view('user.order', [
            'titlePage' => 'Order',
            'orders' => $orders
        ]);
    }
    public function detail($id)
    {
        $product = Product::find($id);
        $product["price"] = number_format($product["price"], 0, ',', '.');;
        return view('user.detail', [
            'titlePage' => 'Detail',
            'product' => $product
        ]);
    }
    public function checkoutView($id)
    {
        $cart = Cart::with('users', 'products')->where('id', $id)->first();
        return view('user.checkout', [
            'titlePage' => 'Checkout',
            'cart' => $cart
        ]);
    }
    public function orderDetail($id)
    {
        // $order = Order::with('users', 'products')->where('id', $id)->first();
        $order = Order::find($id);
        // return view('orderDetail', [
        //     'order' => $order
        // ]);
        
        view()->share('order',$order);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('orderDetail');
        return $pdf->download('order.pdf');
    }

    // POST Function
    public function updateProfile(Request $request)
    {
        $data = User::find(auth()->user()->id);
        if ($request->password == null) {
            $data->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->route('profile')->with('success', 'Update profile success');
        }
        $request['password'] = bcrypt($request->password);
        $data->update($request->all());
        return redirect()->route('profile')->with('success', 'Update profile success');
    }
    public function addCart(Request $request)
    {
        if ($cart = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first()) {
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity
            ]);
            return redirect()->back()->with('success', 'Product added to cart');
        }
        Cart::create($request->all());
        return redirect()->back()->with('success', 'Product added to cart');
    }
    public function deleteCart(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->delete();
        return redirect()->back();
    }
    public function checkout(Request $request)
    {
        $carts = Cart::with('users', 'products')->where('user_id', auth()->user()->id)->get();

        foreach ($carts as $cart) {
            Order::create([
                'user_id' => $cart->users->id,
                'product_id' => $cart->products->id,
                'quantity' => $cart->quantity,
                'total_price' => $cart->products->price * $cart->quantity,
                'address' => $request->address,
                'payment_method' => $request->payment_method,
                'delivery_status' => 'P'
            ]);
            $product = Product::find($cart->product_id);
            $productStock = $product->stock - $cart->quantity;
            $product->stock = $productStock;
            $product->save();
            // dd($product);
            
            Cashflow::create([
                'name'=>'Sell ' . $product->name,
                'amount'=> $product->price * $cart->quantity,
                'type'=>'Cash In'
    
            ]);
            Cart::find($cart->id)->delete();
        }
        Session::flash("success");
        return redirect()->back();
    }
    public function checkoutsingle(Request $request)
    {
        $cart = Cart::with('users', 'products')->where('id', $request->id)->first();
        $product = Product::find($cart->product_id);
        $productStock = $product->stock - $cart->quantity;
        $product->stock = $productStock;
        $product->save();
        Order::create([
            'user_id' => $cart->users->id,
            'product_id' => $cart->products->id,
            'quantity' => $cart->quantity,
            'total_price' => $cart->products->price * $cart->quantity,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'delivery_status' => 'P'
        ]);
        Cashflow::create([
            'name'=>'Sell ' . $product->name,
            'amount'=> $product->price * $cart->quantity,
            'type'=>'Cash In'

        ]);
        Cart::find($cart->id)->delete();
        Session::flash("success");
        return redirect()->route("cart");
    }
}
