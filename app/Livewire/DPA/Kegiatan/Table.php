<?php

namespace App\Livewire\DPA\Kegiatan;

use App\Models\Kegiatan;
use App\Models\Pegawai;
use Livewire\Component;

class Table extends Component
{

    public $program;

    public $kode, $kegiatan, $pegawai_id;

    public function mount($program)
    {
        $this->program = $program;
    }

    public function render()
    {
        $data['kegiatans'] = Kegiatan::orderBy('id', 'DESC')
            ->where('program_id', $this->program->id)
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.kegiatan.table', $data);
    }

    public function store()
    {
        $this->validate([
            'kode' => 'required|string|max:100',
            'kegiatan' => 'required|string',
            'pegawai_id' => 'required|exists:pegawais,uuid',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();

        Kegiatan::create([
            'uuid' => str()->uuid(),
            'program_id' => $this->program->id,
            'pegawai_id' => $pegawai->id,
            'kode' => $this->kode,
            'title' => $this->kegiatan,
            'pagu_awal' => 0,
            'pagu_akhir' => 0,
        ]);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->kegiatan . '</b> kedalam Kegiatan');
        $this->reset(['kode', 'kegiatan', 'pegawai_id']);
    }

    public function update($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Kegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function destroy($uuid)
    {
        Kegiatan::where('uuid', $uuid)->delete();
    }
}
