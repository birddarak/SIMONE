<?php

namespace App\Livewire\DPA\Subkegiatan;

use App\Models\Pegawai;
use App\Models\Subkegiatan;
use Livewire\Component;

class Table extends Component
{

    public $subkegiatan, $kode, $pegawai_id, $kegiatan, $pagu_awal;

    public function mount($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['pegawais'] = Pegawai::all();
        $data['subKegiatans'] = Subkegiatan::where('kegiatan_id', $this->kegiatan->id)->get();
        return view('livewire.d-p-a.subkegiatan.table', $data);
    }

    public function store()
    {
        $this->validate([
            'kode' => 'required|string',
            'subkegiatan' => 'required|string',
            'pegawai_id' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();
        $data = [
            'uuid' => str()->uuid(),
            'kegiatan_id' => $this->kegiatan->id,
            'kode' => $this->kode,
            'title' => $this->subkegiatan,
            'pegawai_id' => $pegawai->id,
            'pagu_awal' => $this->pagu_awal,
            'pagu_akhir' => 0
        ];

        Subkegiatan::create($data);
    }


    public function update($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Subkegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function destroy($uuid)
    {
        Subkegiatan::where('uuid', $uuid)->delete();
    }
}
