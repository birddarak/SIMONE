<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('panel.pages.laporan.index');
    }

    public function print(Request $request)
    {
        $data['programs'] = Program::orderBy('kode', 'ASC')->where('apbd', $request->apbd)->where('tahun_anggaran', $request->tahun_anggaran)->get();
        return view('panel.pages.laporan.print', $data);
    }
}
