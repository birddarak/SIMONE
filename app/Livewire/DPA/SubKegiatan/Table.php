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

        $this->dispatch('alert', html: 'Berhasil menambahkan Sub Kegiatan');
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

        $this->dispatch('alert', html: 'Berhasil menambahkan Indikator Sub Kegiatan');
        $this->reset(['indikator']);
    }

    public function updateSubkegiatan($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        $data = Subkegiatan::where('uuid', $uuid)->first();
        $data->update(
            [
                $field => (is_null($pegawai)) ? $value : $pegawai->id
            ]
        );
        $this->dispatch('alert', html: 'Berhasil memperbaharui Sub Kegiatan');
    }

    public function updateIndikator($uuid, $field, $value)
    {
        $data = IndikatorSubkegiatan::where('uuid', $uuid)->first();
        $data->update(
            [
                $field => $value
            ]
        );
        $this->dispatch('alert', html: 'Berhasil memperbaharui Indikator Sub Kegiatan');
    }

    public function destroySubkegiatan($uuid)
    {
        $data = Subkegiatan::where('uuid', $uuid)->first();
        $data->delete();
        $this->dispatch('alert', html: 'Berhasil menghapus Sub Kegiatan');
    }

    public function destroyIndikator($uuid)
    {
        $data = IndikatorSubkegiatan::where('uuid', $uuid)->first();
        $data->delete();
        $this->dispatch('alert', html: 'Berhasil menghapus Indikator Sub Kegiatan');
    }
}
