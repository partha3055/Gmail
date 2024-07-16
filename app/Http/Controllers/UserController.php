<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    // public function register()
    // {
    //     return view('user.register');
    // }

    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);

            $user = User::create($data);
            if ($user) {
                return redirect()->route('user-login');
            }
        }
        return view('user.register');
    }


    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cred = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            //$user = User::create($data);
            if (Auth::attempt($cred)) {
                //echo ("Right");
                return redirect()->route('dashboard');
            }
        }
        return view('user.login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('user.dashboard');
        } else {
            return redirect()->route('user-login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('user.login');
        // if (Auth::check()) {
        //     return view('user.dashboard');
        // } else {
        //     return redirect()->route('user-login');
        // }
    }
}
