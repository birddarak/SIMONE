<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\RealisasiSubkegiatan;

class RealisasiController extends Controller
{
    public function index(){
        return view('panel.pages.realisasi.program');
    }

    public function realisasi_kegiatan(Program $program){
        return view('panel.pages.realisasi.kegiatan', ['program' => $program]);
    }

    public function realisasi_subkegiatan(Kegiatan $kegiatan){
        return view('panel.pages.realisasi.subkegiatan', ['kegiatan' => $kegiatan]);
    }

    public function rincian_belanja(RealisasiSubkegiatan $realisasi_subkegiatan){
        return view('panel.pages.realisasi.rincian-belanja', ['realisasi_subkegiatan' => $realisasi_subkegiatan]);
    }
}
