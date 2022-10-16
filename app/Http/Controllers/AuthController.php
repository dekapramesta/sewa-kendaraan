<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function LoginAction(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->level == 1) {
                $request->session()->regenerate();
                return redirect()->route('admin');
            } elseif (Auth::user()->level == 2) {
                $request->session()->regenerate();
                return redirect()->route('penyetuju');
            }
        } else {
            return redirect()->route('login')->withErrors(['Email atau Password salah']);
        }
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
