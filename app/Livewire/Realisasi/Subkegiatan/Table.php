<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use App\Models\RealisasiSubkegiatan;
use Illuminate\Support\Facades\File;

class Table extends Component
{

    public $kegiatan;

    // FORM REALISASI
    public $triwulan, $tanggal, $capaian, $satuan, $pagu;

    public function mount($kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['subkegiatans'] = Subkegiatan::orderBy('kode', 'ASC')->where('kegiatan_id', $this->kegiatan->id)->get();
        $data['subkegiatan_realisasis'] = RealisasiSubkegiatan::all();
        return view('livewire.realisasi.subkegiatan.table', $data);
    }

    public function store($uuid)
    {
        $this->validate([
            'triwulan' => 'required|string|in:I,II,III,IV',
            'tanggal' => 'required',
            'capaian' => 'required|string',
            // 'satuan' => 'required|string',
            // 'pagu' => 'required|integer',
        ]);

        $subkegiatan = Subkegiatan::where('uuid', $uuid)->first();
        // $file = (!is_null($this->file)) ? $this->file->store('assets/sub-kegiatan/realisasi', 'public') : NULL;
        // $rincian = (!is_null($this->rincian)) ? $this->rincian : NULL;

        $data = [
            'subkegiatan_id' => $subkegiatan->id,
            'uuid' => str()->uuid(),
            'tanggal' => $this->tanggal,
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
            // 'satuan' => $this->satuan,
            'pagu' => $this->pagu,
        ];

        RealisasiSubkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan realisasi triwulan <b>' . $this->triwulan . '</b> kedalam Sub Kegiatan <b>' . $subkegiatan->title . '</b>');
        $this->reset(['triwulan', 'tanggal', 'capaian', 'satuan', 'pagu']);
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
        // File::delete('storage/' . $data->file);
        $data->delete();
    }
}
