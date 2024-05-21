<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register', [
            'titlePage' => 'Register'
        ]);
    }
    public function loginView()
    {
        return view('auth.login', [
            'titlePage' => 'Login'
        ]);
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'max:25|required',
            'email' => 'email:dns|unique:users|required',
            'password' => 'min:8|required|same:password2',
            'password2'  => 'min:8|required'
        ]);
        if ($request["password"] != $request["password"]) {
            return redirect()->route('register')->with('failed', 'Password and repeat password not same');
        }
        $validateData["password"] = bcrypt($validateData["password"]);
        User::create($validateData);
        return redirect()->route('login')->with('success', 'Registered Successfully');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email:dns|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_admin) {
                return redirect()->to('/homeadmin');
            }
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('failed', 'Email or Password wrong');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
}