<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function store(Request $request)
    {
        $request->validate([
		    'nama'  => 'required|max:10',
		    'email' => ['required','email'],
		    'pertanyaan' => 'required|max:300|min:8',
		],[
            'nama.required' => 'Nama wajib diisi',
            'email.email' => 'Format email tidak valid'
        ]);

        // return view('home-question-respon', $request);
        return redirect()->route('home.index')->with('info', 'Ya ya ya saya setuju');


    }
}
