<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use App\Models\Kegiatan;
use App\Models\RealisasiSubkegiatan;
use App\Models\Subkegiatan;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Table extends Component
{
    use WithFileUploads;

    public $kegiatan;

    // FORM REALISASI
    public $triwulan, $tanggal, $target,  $pagu, $rincian, $file, $satuan;

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

        $file = $this->file->store('assets/sub-kegiatan/realisasi', 'public');

        $data = [
            'uuid' => str()->uuid(),
            'subkegiatan_id' => $subKegiatan->id,
            'tanggal' => $this->tanggal,
            'triwulan' => $this->triwulan,
            'target' => $this->target,
            'satuan' => $this->satuan,
            'pagu' => $this->pagu,
            'rincian' => $this->rincian,
            'file' => $file,
            'satuan' => $this->satuan,
        ];

        $this->file = null;
        $this->triwulan = '';
        $this->target = '';
        $this->satuan = '';
        $this->pagu = '';
        $this->satuan = '';

        RealisasiSubkegiatan::create($data);
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
        $data = RealisasiSubkegiatan::where('uuid', $uuid)->first();
        File::delete('storage/' . $data->file);
        $data->delete();
    }
}
