<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        
        if(empty($user))
        {
            return redirect()->back()->with('error', 'Email tidak terdaftar');
        }
        if(Hash::check($request->password, $user->password) == false)
        {
            return redirect()->back()->with('error', 'Password salah');
        }

        Auth::login($user);
        return redirect()->route('admin.projects.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
