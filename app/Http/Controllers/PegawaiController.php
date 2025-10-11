<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{

    public function index()
    {
        return view('pegawai-form');
    }


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

        $hobiArray = explode(',', $request->hobi);
        $hobiArray = array_map('trim', $hobiArray);

        if (count($hobiArray) < 5) {
            return redirect()->route('pegawai.index')->withErrors([
                'hobi' => 'Minimal harus ada 5 hobi yang dipisahkan dengan koma'
            ])->withInput();
        }

        $request->session()->put('mahasiswa_data', $request->all());

        return redirect()->route('pegawai.show');
    }


    public function show(Request $request)
    {
        $data = $request->session()->get('mahasiswa_data');

        if (!$data) {
            return redirect()->route('pegawai.index');
        }

        $today = Carbon::now();
        $tanggalLahir = Carbon::parse($data['tanggal_lahir']);
        $tglWisuda = Carbon::parse($data['tgl_harus_wisuda']);

        $umur = $tanggalLahir->diffInYears($today);

        $jarakHari = $today->diffInDays($tglWisuda, false);

        $hobiArray = explode(',', $data['hobi']);
        $hobiArray = array_map('trim', $hobiArray);

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
