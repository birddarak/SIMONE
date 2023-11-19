<?php

namespace App\Livewire\DPA\Subkegiatan;

use App\Models\IndikatorSubkegiatan;
use App\Models\Pegawai;
use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;

class Table extends Component
{
    public $kegiatan;

    public $kode, $subkegiatan, $pegawai_id, $pagu_awal;

    public $indikator = [], $target = [], $satuan = [];

    public function mount($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['kegiatan'] = Kegiatan::where('uuid', $this->kegiatan->uuid)->first();
        $data['subKegiatans'] = Subkegiatan::where('kegiatan_id', $this->kegiatan->id)->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.subkegiatan.table', $data);
    }

    public function storeSubkegiatan()
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

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->subkegiatan . '</b> kedalam Sub Kegiatan');
        $this->reset(['kode', 'pegawai_id', 'pagu_awal']);
    }

    public function storeIndikator(Subkegiatan $subkegiatan)
    {
        if (empty($this->indikator)) {
            $this->indikator[$subkegiatan->uuid] = null;
        }
        if (empty($this->target)) {
            $this->target[$subkegiatan->uuid] = null;
        }
        if (empty($this->satuan)) {
            $this->satuan[$subkegiatan->uuid] = null;
        }

        $this->validate([
            'indikator.' . $subkegiatan->uuid => 'required|string',
            'target.' . $subkegiatan->uuid => 'required|string',
            'satuan.' . $subkegiatan->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'subkegiatan_id' => $subkegiatan->id,
            'title' => $this->indikator[$subkegiatan->uuid],
            'target' => $this->target[$subkegiatan->uuid],
            'satuan' => $this->satuan[$subkegiatan->uuid],
        ];

        IndikatorSubkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$subkegiatan->uuid] . '</b>');
        $this->reset(['indikator', 'target', 'satuan']);
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
