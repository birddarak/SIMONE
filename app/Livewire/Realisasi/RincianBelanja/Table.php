<?php

namespace App\Livewire\Realisasi\RincianBelanja;

use App\Models\RealisasiSubkegiatan;
use Livewire\Component;
use App\Models\RincianBelanja;
use Livewire\WithFileUploads;

class Table extends Component
{
    use WithFileUploads;

    public $realisasi_subkegiatan;

    public $rincian, $tanggal, $pagu, $keterangan, $file;

    public function mount($realisasi_subkegiatan)
    {
        $this->realisasi_subkegiatan = $realisasi_subkegiatan;
    }

    public function render()
    {
        $data['rincian_belanjas'] = RincianBelanja::where('realisasi_subkegiatan_id', $this->realisasi_subkegiatan->id)->get();
        return view('livewire.realisasi.rincian-belanja.table', $data);
    }

    //     $file = (!is_null($this->file)) ? $this->file->store('assets/sub-kegiatan/realisasi', 'public') : NULL;
    // $rincian = (!is_null($this->rincian)) ? $this->rincian : NULL;

    public function store()
    {
        $this->validate([
            'rincian' => 'required|string',
            'tanggal' => 'required',
            'pagu' => 'required|integer',
            'keterangan' => 'nullable|string',
            'file' => 'nullable',
        ]);

        // $realisasi_subkegiatan = RealisasiSubkegiatan::where('uuid', $this->realisasi_subkegiatan->uuid)->first();

        $file = (!is_null($this->file)) ? $this->file->store('assets/sub-kegiatan/realisasi/rincian', 'public') : NULL;
        // $rincian = (!is_null($this->rincian)) ? $this->rincian : NULL;

        $data = [
            'realisasi_subkegiatan_id' => $this->realisasi_subkegiatan->id,
            'uuid' => str()->uuid(),
            'rincian' => $this->rincian,
            'tanggal' => $this->tanggal,
            'pagu' => $this->pagu,
            'keterangan' => $this->keterangan,
            'file' => $file,
        ];

        RincianBelanja::create($data);

        $this->dispatch('alert', html: 'Berhasil menambahkan <b>' . $this->rincian . '</b>');
        $this->reset(['rincian', 'tanggal', 'pagu', 'keterangan', 'file']);
    }

    public function update($uuid, $field, $value)
    {
        $data = RincianBelanja::where('uuid', $uuid)->first();
        $data->update(
            [
                $field => $value
            ]
        );
        $this->dispatch('alert', html: 'Berhasil memperbaharui Rincian');
    }

    public function destroy($uuid)
    {
        $data = RincianBelanja::where('uuid', $uuid)->first();
        // File::delete('storage/' . $data->file);
        $this->dispatch('alert', html: 'Berhasil menghapus ' . $data->rincian);
        $data->delete();
    }
}
