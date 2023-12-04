<?php

namespace App\Exports;

use App\Models\Program;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonevExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $apbd, $tahun_anggaran, $programs;

    public function __construct($apbd, $tahun_anggaran)
    {
        $this->apbd = $apbd;
        $this->tahun_anggaran = $tahun_anggaran;
        $this->programs = Program::orderBy('kode', 'ASC')->where('apbd', $apbd)->where('tahun_anggaran', $tahun_anggaran)->get();
    }

    public function view(): View
    {
        return view('panel.pages.laporan.print', [
            'apbd' => $this->apbd,
            'tahun_anggaran' => $this->tahun_anggaran,
            'programs' => $this->programs
        ]);
    }
}
