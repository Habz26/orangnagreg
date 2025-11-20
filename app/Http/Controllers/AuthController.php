<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validasi input & captcha
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        'captcha' => 'required|captcha',
    ]);

    // Ambil hanya email & password untuk auth
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        $user = auth()->user();

        // Logika role baru
        if ($user->role == 1) {
            return redirect()->route('dashboard'); // admin
        } else {
            return redirect()->route('dashboarduser'); // selain admin
        }
    }

    return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
}


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboarduser');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed:password_confirmation',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user', // Role dari input, default 'user'
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
