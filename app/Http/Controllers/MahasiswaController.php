<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataMahasiswa'] = Mahasiswa::all();
        return view('admin.mahasiswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|int|max:100',
            'nama_mahasiswa' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'jurusan' => 'required|min:8|confirmed',
            'alamat' => 'required|min:8|confirmed'
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $param1)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataMahasiswa'] = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'email' => 'required',
            'jurusan' => 'required|date',
            'alamat' => 'required|in:Male,Female'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
