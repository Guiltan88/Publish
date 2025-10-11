<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource - MENAMPILKAN FORM INPUT
     */
    public function index()
    {
        return view('pegawai-form'); // Langsung return view form
    }

    /**
     * Menyimpan data dari form
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'hobi' => 'required|string',
            'tgl_harus_wisuda' => 'required|date',
            'current_semester' => 'required|integer|min:1|max:14',
            'future_goal' => 'required|string|max:200',
        ]);

        // Validasi minimal 5 hobi
        $hobiArray = explode(',', $request->hobi);
        $hobiArray = array_map('trim', $hobiArray);

        if (count($hobiArray) < 5) {
            return redirect()->route('pegawai.index')->withErrors([
                'hobi' => 'Minimal harus ada 5 hobi yang dipisahkan dengan koma'
            ])->withInput();
        }

        // Simpan data ke session untuk ditampilkan di halaman show
        $request->session()->put('mahasiswa_data', $request->all());

        return redirect()->route('pegawai.show');
    }

    /**
     * Menampilkan data mahasiswa yang telah diinput
     */
    public function show(Request $request)
    {
        $data = $request->session()->get('mahasiswa_data');

        if (!$data) {
            return redirect()->route('pegawai.index');
        }

        // Proses perhitungan
        $today = Carbon::now();
        $tanggalLahir = Carbon::parse($data['tanggal_lahir']);
        $tglWisuda = Carbon::parse($data['tgl_harus_wisuda']);

        // Hitung umur
        $umur = $tanggalLahir->diffInYears($today);

        // Hitung jarak hari sampai wisuda
        $jarakHari = $today->diffInDays($tglWisuda, false);

        // Konversi hobi dari string ke array
        $hobiArray = explode(',', $data['hobi']);
        $hobiArray = array_map('trim', $hobiArray);

        // Pesan berdasarkan semester
        $pesanSemester = $data['current_semester'] < 3
            ? "Masih Awal, Kejar TAK"
            : "Jangan main-main, kurang-kurangi main game!";

        $result = [
            'name' => $data['name'],
            'my_age' => $umur,
            'hobbies' => $hobiArray,
            'tgl_harus_wisuda' => $tglWisuda->format('d F Y'),
            'time_to_study_left' => $jarakHari >= 0 ? "$jarakHari hari lagi" : "Sudah lewat " . abs($jarakHari) . " hari",
            'current_semester' => $data['current_semester'],
            'semester_message' => $pesanSemester,
            'future_goal' => $data['future_goal']
        ];

        return view('pegawai-show', $result);
    }
}
