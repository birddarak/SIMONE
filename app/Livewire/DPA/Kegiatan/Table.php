<?php

namespace App\Livewire\DPA\Kegiatan;

use App\Models\IndikatorKegiatan;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use Livewire\Component;

class Table extends Component
{

    public $program;

    public $pegawai_id, $kode, $kegiatan, $target, $satuan;

    public $indikator = [];

    public function mount($program)
    {
        $this->program = $program;
    }

    public function render()
    {
        $data['kegiatans'] = Kegiatan::orderBy('kode', 'ASC')
            ->where('program_id', $this->program->id)
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.kegiatan.table', $data);
    }

    public function storeKegiatan()
    {
        $this->validate([
            'pegawai_id' => 'required|exists:pegawais,uuid',
            'kode' => 'required|string|max:100',
            'kegiatan' => 'required|string',
            'target' => 'required|string',
            'satuan' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();

        Kegiatan::create([
            'program_id' => $this->program->id,
            'pegawai_id' => $pegawai->id,
            'uuid' => str()->uuid(),
            'kode' => $this->kode,
            'title' => $this->kegiatan,
            'target' => $this->target,
            'satuan' => $this->satuan,
        ]);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->kegiatan . '</b> kedalam Kegiatan');
        $this->reset(['pegawai_id', 'kode', 'kegiatan', 'target', 'satuan']);
    }

    public function storeIndikator(Kegiatan $kegiatan)
    {
        if (empty($this->indikator)) {
            $this->indikator[$kegiatan->uuid] = null;
        }

        $this->validate([
            'indikator.' . $kegiatan->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'kegiatan_id' => $kegiatan->id,
            'title' => $this->indikator[$kegiatan->uuid],
        ];

        IndikatorKegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$kegiatan->uuid] . '</b>');
        $this->reset(['indikator']);
    }

    public function updateKegiatan($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Kegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function updateIndikator($uuid, $field, $value)
    {
        IndikatorKegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroyKegiatan($uuid)
    {
        Kegiatan::where('uuid', $uuid)->delete();
    }

    public function destroyIndikator($uuid)
    {
        IndikatorKegiatan::where('uuid', $uuid)->delete();
    }
}
