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
        $data['programs'] = Program::orderBy('id', 'DESC')
            ->where('tahun_anggaran', date('Y'))
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.table', $data);
    }


    public function simpan()
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
        Program::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function delete($uuid)
    {
        Program::where('uuid', $uuid)->delete();
    }
}
