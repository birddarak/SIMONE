<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('panel.pages.laporan.index');
    }

    public function exportPDF(Request $request)
    {
        $data['apbd'] = $request->apbd;
        $data['tahun_anggaran'] = $request->tahun_anggaran;

        if (auth()->user()->rule == 'kabid') {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('pegawai_id', auth()->user()->pegawai->id)
                ->where('tahun_anggaran', $request->tahun_anggaran)->where('apbd', $request->apbd)
                ->get();
        } else {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('tahun_anggaran', $request->tahun_anggaran)->where('apbd', $request->apbd)
                ->get();
        }


        // Baca isi file HTML
        $css = view('panel.pages.laporan.partials.style')->render();
        $htmlContent = view('panel.pages.laporan.print', $data)->render();

        $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'legal-L']);
        // Set margin
        $mpdf->SetMargins(0, 0, 10);
        // css
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        // content
        $mpdf->WriteHTML($htmlContent);
        // output
        $mpdf->Output('monev-' . Carbon::now()->timestamp . '.pdf', 'I');
    }
}
