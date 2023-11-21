<?php

namespace App\Http\Controllers;

use App\Models\Program;

class LaporanController extends Controller
{
    public function print()
    {
        $data['programs'] = Program::orderBy('id', 'DESC')->where('apbd', 'murni')->where('tahun_anggaran', '2023')->get();

        return view('panel.pages.laporan.index', $data);
    }
}
