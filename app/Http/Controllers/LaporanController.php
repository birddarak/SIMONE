<?php

namespace App\Http\Controllers;

use App\Exports\MonevExport;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Mpdf\Mpdf as PDF; 

class LaporanController extends Controller
{
    public function index()
    {
        return view('panel.pages.laporan.index');
    }

    public function print(Request $request)
    {
        $data['apbd'] = $request->apbd;
        $data['tahun_anggaran'] = $request->tahun_anggaran;
        $data['programs'] = Program::orderBy('kode', 'ASC')->where('apbd', $request->apbd)->where('tahun_anggaran', $request->tahun_anggaran)->get();
        return view('panel.pages.laporan.print', $data);
    }
    
    public function exportExcel(Request $request){
        return (new MonevExport($request->apbd, $request->tahun_anggaran))->download('monev-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function exportPDF(Request $request){
        $mpdf = new PDF();
        // $mpdf->write
        // return 
    }
}
