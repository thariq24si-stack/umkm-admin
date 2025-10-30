<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function index()
    {
        return view('auth.login');
    }

 
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'  => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 3 karakter',
        ]);
    
        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();
        
        // Cek apakah email ada
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar'
            ])->withInput();
        }
        
        // Cek password menggunakan Hash::check
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah'
            ])->withInput();
        }
        
        // Login berhasil - simpan session
        Auth::login($user);
        
        // Redirect ke dashboard
        return redirect()->route('home')->with('success', 'Selamat datang, ' . $user->name . '!');
    }
    
    // Method untuk logout (opsional tapi recommended)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('auth.index')->with('success', 'Berhasil logout');
    }

}