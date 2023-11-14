<?php

namespace App\Livewire\DPA;

use App\Models\Pegawai;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    // Model Filter
    public  $tahun_anggaran = '2023', $apbd = 'murni';

    // Model Form
    public $kode, $program, $pegawai_id;

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        $data['programs'] = Program::orderBy('id', 'DESC')
            ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.table', $data);
    }


    public function store()
    {
        $this->validate([
            'tahun_anggaran' => 'required|string',
            'apbd' => 'required|string|in:murni,perubahan',
            'kode' => 'required|string',
            'program' => 'required|string',
            'pegawai_id' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();
        $data = [
            'uuid' => str()->uuid(),
            'kode' => $this->kode,
            'title' => $this->program,
            'pegawai_id' => $pegawai->id,
            'tahun_anggaran' => $this->tahun_anggaran,
            'apbd' => $this->apbd,
            'pagu_awal' => 0,
            'pagu_akhir' => 0
        ];

        Program::create($data);
    }

    public function update($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Program::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function destroy($uuid)
    {
        Program::where('uuid', $uuid)->delete();
    }
}
