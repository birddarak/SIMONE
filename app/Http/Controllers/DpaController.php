<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;

class DpaController extends Controller
{
    public function dpa_program($tahun_anggaran, $apbd)
    {
        if (auth()->user()->rule == 'kabid' || auth()->user()->rule == 'non-admin') {
            return abort(403);
        }
        $data['tahun_anggaran'] = $tahun_anggaran;
        $data['apbd'] = $apbd;
        return view('panel.pages.dpa.program', $data);
    }

    public function dpa_kegiatan(Program $program)
    {
        if (auth()->user()->rule == 'kabid' || auth()->user()->rule == 'non-admin') {
            if ($program->pegawai_id != auth()->user()->pegawai->id) {
                return abort(403);
            }
        }
        return view('panel.pages.dpa.kegiatan', ['program' => $program]);
    }

    public function dpa_subkegiatan(Kegiatan $kegiatan)
    {
        if (auth()->user()->rule == 'kabid' || auth()->user()->rule == 'non-admin') {
            if ($kegiatan->program->pegawai_id != auth()->user()->pegawai->id) {
                return abort(403);
            }
        }
        return view('panel.pages.dpa.subkegiatan', ['kegiatan' => $kegiatan]);
    }
}
