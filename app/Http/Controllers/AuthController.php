<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   
    public function index()
    {
        return view('auth.login');
    }

 
    public function login(Request $request)
    {
        $request->validate([
        'email'  => 'required|email',
        'password' => 'required|min:3|regex :/[A-Z]/',
        ], [
            'password.min' => 'password harus minimal punya 3 karakter',
            'password.regex' => 'password harus berisi huruf kapital'

        ]
    
    );
    
    
        $email = $request->email;
    
        return view('auth.success' , ['email' => $email]);
    
    }

}