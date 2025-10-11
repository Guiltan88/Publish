<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:10',
            'password' => ['required','min:3','regex:/[A-Z]/'],
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Paswword minimal 3 Karakter',
            'password.regex' => 'Password harus mengandung minimal satu huruf kaptal',
        ]);

        return view('form-setelah-login',$request);

    }
}
