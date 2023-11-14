<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use App\Models\Kegiatan;
use App\Models\RealisasiSubkegiatan;
use App\Models\Subkegiatan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Table extends Component
{
    use WithFileUploads;

    public $kegiatan;

    // FORM REALISASI
    public $triwulan, $target, $satuan, $pagu, $rincian, $file;

    public function mount($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['kegiatan'] = Kegiatan::where('uuid', $this->kegiatan->uuid)->first();
        $data['subkegiatans'] = Subkegiatan::where('kegiatan_id', $this->kegiatan->id)->get();
        $data['subkegiatan_realisasis'] = RealisasiSubkegiatan::all();
        return view('livewire.realisasi.subkegiatan.table', $data);
    }

    public function simpan($uuid)
    {
        $this->validate([
            'triwulan' => 'required|string|in:I,II,III,IV',
            'target' => 'required|string',
            'satuan' => 'required|string',
            'pagu' => 'required',
        ]);

        $subKegiatan = Subkegiatan::where('uuid', $uuid)->first();

        // $file = $this->file('file')->store('assets/sub-kegiatan/realisasi', 'public');

        $data = [
            'uuid' => str()->uuid(),
            'subkegiatan_id' => $subKegiatan->id,
            'tanggal' => date('Y-m-d'),
            'triwulan' => $this->triwulan,
            'target' => $this->target,
            'satuan' => $this->satuan,
            'pagu' => $this->pagu,
            'rincian' => $this->rincian,
            'file' => 'asdasdasd',
            'satuan' => 'point',
        ];

        RealisasiSubkegiatan::create($data);
    }
}
