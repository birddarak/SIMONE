<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;

class RealisasiController extends Controller
{
    public function index(){
        return view('panel.pages.realisasi.index');
    }

    public function realisasi_kegiatan(Program $program){
        return view('panel.pages.realisasi.kegiatan', ['program' => $program]);
    }

    public function realisasi_subkegiatan(Kegiatan $kegiatan){
        return view('panel.pages.realisasi.subkegiatan', ['kegiatan' => $kegiatan]);
    }
}
