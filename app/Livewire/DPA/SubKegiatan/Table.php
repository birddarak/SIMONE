<?php

namespace App\Livewire\DPA\Subkegiatan;

use App\Models\IndikatorSubkegiatan;
use App\Models\Pegawai;
use Livewire\Component;
use App\Models\Subkegiatan;

class Table extends Component
{
    public $kegiatan;

    public $pegawai_id, $kode, $subkegiatan, $target, $satuan, $pagu;

    public $indikator = [];

    public function mount($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['subKegiatans'] = Subkegiatan::orderBy('kode', 'ASC')->where('kegiatan_id', $this->kegiatan->id)->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.subkegiatan.table', $data);
    }

    public function storeSubkegiatan()
    {
        $this->validate([
            'pegawai_id' => 'required|string',
            'kode' => 'required|string',
            'subkegiatan' => 'required|string',
            'target' => 'required|integer',
            'satuan' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();
        $data = [
            'pegawai_id' => $pegawai->id,
            'kegiatan_id' => $this->kegiatan->id,
            'uuid' => str()->uuid(),
            'kode' => $this->kode,
            'title' => $this->subkegiatan,
            'target' => $this->target,
            'satuan' => $this->satuan,
            'pagu' => $this->pagu,
        ];

        Subkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->subkegiatan . '</b> kedalam Sub Kegiatan');
        $this->reset(['pegawai_id', 'kode', 'subkegiatan', 'target', 'satuan', 'pagu']);
    }

    public function storeIndikator(Subkegiatan $subkegiatan)
    {
        if (empty($this->indikator)) {
            $this->indikator[$subkegiatan->uuid] = null;
        }

        $this->validate([
            'indikator.' . $subkegiatan->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'subkegiatan_id' => $subkegiatan->id,
            'title' => $this->indikator[$subkegiatan->uuid],
        ];

        IndikatorSubkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$subkegiatan->uuid] . '</b>');
        $this->reset(['indikator']);
    }

    public function updateSubkegiatan($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Subkegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function updateIndikator($uuid, $field, $value)
    {
        IndikatorSubkegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroySubkegiatan($uuid)
    {
        Subkegiatan::where('uuid', $uuid)->delete();
    }

    public function destroyIndikator($uuid)
    {
        IndikatorSubkegiatan::where('uuid', $uuid)->delete();
    }
}
