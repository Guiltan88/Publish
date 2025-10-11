<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $pesan = "Menampilkan data matakuliah";
        return view('halaman-matakuliah', compact('pesan'));
    }

    public function show(string $id = null)
    {
        if ($id) {
            $pesan = "Anda mengakses matakuliah $id";
        } else {
            $pesan = "Masukkan kode matakuliah!";
        }

        return view('halaman-matakuliah', compact('pesan'));
    }
}