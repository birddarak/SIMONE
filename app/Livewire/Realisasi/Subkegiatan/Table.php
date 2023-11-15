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
    public $triwulan, $target, $pagu, $rincian, $file, $satuan;

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

    public function store($uuid)
    {
        $this->validate([
            'triwulan' => 'required|string|in:I,II,III,IV',
            'target' => 'required|string',
            'satuan' => 'required|string',
            'pagu' => 'required',
        ]);

        $subkegiatan = Subkegiatan::where('uuid', $uuid)->first();

        // $this->file->store('assets/sub-kegiatan/realisasi', 'public');

        $data = [
            'uuid' => str()->uuid(),
            'subkegiatan_id' => $subkegiatan->id,
            'tanggal' => date('Y-m-d'),
            'triwulan' => $this->triwulan,
            'target' => $this->target,
            'satuan' => $this->satuan,
            'pagu' => $this->pagu,
            'rincian' => $this->rincian,
            // 'file' => $this->file,
            'satuan' => $this->satuan,
        ];

        RealisasiSubkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan realisasi triwulan <b>' . $this->triwulan . '</b> kedalam Sub Kegiatan <b>' . $subkegiatan->title .'</b>');
        $this->reset(['triwulan', 'target',  'pagu', 'rincian', 'file', 'satuan']);
    }

    public function update($uuid, $field, $value)
    {
        RealisasiSubkegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroy($uuid)
    {
        RealisasiSubkegiatan::where('uuid', $uuid)->delete();
    }
}
