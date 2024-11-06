<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)|| strlen($request->password) < 8) {
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }

        Auth::login($user);

        if ($user->role == 'seller') {
            return redirect()->route('seller.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
