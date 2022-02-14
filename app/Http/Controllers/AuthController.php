<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 1) {
                return redirect()->intended('admin');
            } elseif ($user->role_id == 2) {
                return redirect()->intended('users');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->role_id == 1) {
                    return redirect()->intended('admin');
                } elseif ($user->role_id == 2) {
                    return redirect()->intended('users');
                }
                return redirect()->intended('/');
            }

        return redirect('login')->with("error", "Username / Password salah.");
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return redirect('login')->with("success", "Log out Berhasil");
    }
}
