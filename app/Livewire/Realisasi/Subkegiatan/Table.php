<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use App\Models\RealisasiSubkegiatan;

class Table extends Component
{

    public $kegiatan;

    // FORM REALISASI
    public $triwulan, $capaian, $satuan;

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
            'capaian' => 'required|string',
        ]);

        $subkegiatan = Subkegiatan::where('uuid', $uuid)->first();

        $data = [
            'subkegiatan_id' => $subkegiatan->id,
            'uuid' => str()->uuid(),
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
        ];

        RealisasiSubkegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan realisasi triwulan <b>' . $this->triwulan . '</b> kedalam Sub Kegiatan <b>' . $subkegiatan->title . '</b>');
        $this->reset(['triwulan', 'capaian', 'satuan']);
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
        $data->delete();
    }
}
