<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function index()
    {
        $name = "Ilham Pratama";
        $tanggal_lahir = Carbon::create(2003, 5, 12);
        $tgl_harus_wisuda = Carbon::create(2026, 7, 15);
        $current_semester = 4;
        $future_goal = "Menjadi Software Engineer di perusahaan besar";

        // Hitung umur
        $my_age = $tanggal_lahir->age;

        // Daftar hobi minimal 5 item
        $hobbies = ["Ngoding", "Mendengarkan musik", "Main game", "Nonton film", "Bersepeda"];

        // Hitung jarak hari dari hari ini ke tanggal wisuda
        $time_to_study_left = Carbon::now()->diffInDays($tgl_harus_wisuda, false);

        // Pesan motivasi tergantung semester
        if ($current_semester < 3) {
            $motivasi = "Masih awal, kejar TAK!";
        } else {
            $motivasi = "Jangan main-main, kurang-kurangi main game!";
        }

        // Kirim data ke view
        return view('pegawai', [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda->format('d-m-Y'),
            'time_to_study_left' => $time_to_study_left,
            'current_semester' => $current_semester,
            'motivasi' => $motivasi,
            'future_goal' => $future_goal
        ]);
    }
}
