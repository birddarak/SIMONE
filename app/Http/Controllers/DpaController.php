<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;

class DpaController extends Controller
{
    public function index()
    {
        return view('panel.pages.dpa.program');
    }

    public function dpa_kegiatan(Program $program)
    {
        return view('panel.pages.dpa.kegiatan', ['program' => $program]);
    }

    public function dpa_subkegiatan(Kegiatan $kegiatan)
    {
        return view('panel.pages.dpa.subkegiatan', ['kegiatan' => $kegiatan]);
    }
}
