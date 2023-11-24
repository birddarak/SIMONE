<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\RealisasiSubkegiatan;

class RealisasiController extends Controller
{
    public function index()
    {
        return view('panel.pages.realisasi.program');
    }

    public function realisasi_kegiatan(Program $program)
    {
        if (auth()->user()->rule == 'kabid') {
            if ($program->pegawai_id != auth()->user()->pegawai->id) {
                return abort(403);
            }
        }
        return view('panel.pages.realisasi.kegiatan', ['program' => $program]);
    }

    public function realisasi_subkegiatan(Kegiatan $kegiatan)
    {
        if (auth()->user()->rule == 'kabid') {
            if ($kegiatan->program->pegawai_id != auth()->user()->pegawai->id) {
                return abort(403);
            }
        }
        return view('panel.pages.realisasi.subkegiatan', ['kegiatan' => $kegiatan]);
    }

    public function rincian_belanja(RealisasiSubkegiatan $realisasi_subkegiatan)
    {
        if (auth()->user()->rule == 'kabid') {
            if ($realisasi_subkegiatan->subkegiatan->kegiatan->program->pegawai_id != auth()->user()->pegawai->id) {
                return abort(403);
            }
        }
        return view('panel.pages.realisasi.rincian-belanja', ['realisasi_subkegiatan' => $realisasi_subkegiatan]);
    }
}
