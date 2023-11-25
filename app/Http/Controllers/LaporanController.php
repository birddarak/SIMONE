<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data['programs'] = Program::orderBy('kode', 'ASC')->where('apbd', 'murni')->where('tahun_anggaran', date('Y'))->get();
        return view('panel.pages.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $data['programs'] = Program::orderBy('kode', 'ASC')->where('apbd', $request->apbd)->where('tahun_anggaran', $request->tahun_anggaran)->get();
        return view('panel.pages.laporan.print', $data);
    }
}
