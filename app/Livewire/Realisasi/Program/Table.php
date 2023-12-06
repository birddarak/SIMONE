<?php

namespace App\Livewire\Realisasi\Program;

use App\Models\Pegawai;
use App\Models\Program;
use App\Models\RealisasiProgram;
use Livewire\Component;

class Table extends Component
{

    // Model Filter
    public $tahun_anggaran, $apbd = 'murni';

    // FORM REALISASI
    public $triwulan, $capaian, $satuan;

    // Model Form
    public $kode, $program, $pegawai_id;

    public function mount() {
        $this->tahun_anggaran = date("Y");
    }

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        if (auth()->user()->rule == 'kabid') {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('pegawai_id', auth()->user()->pegawai->id)
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::where('id', auth()->user()->pegawai->id)->get();
        } else {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::all();
        }

        return view('livewire.realisasi.program.table', $data);
    }

    public function store($uuid)
    {
        $this->validate([
            'triwulan' => 'required|string|in:I,II,III,IV',
            'capaian' => 'required|string',
        ]);

        $program = Program::where('uuid', $uuid)->first();

        $data = [
            'program_id' => $program->id,
            'uuid' => str()->uuid(),
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
        ];

        RealisasiProgram::create($data);

        session()->flash('message', 'Berhasil menambahkan realisasi triwulan <b>' . $this->triwulan . '</b> kedalam Program <b>' . $program->title . '</b>');
        $this->reset(['triwulan', 'capaian', 'satuan']);
    }

    public function update($uuid, $field, $value)
    {
        RealisasiProgram::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroy($uuid)
    {
        $data = RealisasiProgram::where('uuid', $uuid)->first();
        $data->delete();
    }
}
