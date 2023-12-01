<?php

namespace App\Livewire\Realisasi\Kegiatan;

use App\Models\Kegiatan;
use App\Models\RealisasiKegiatan;
use Livewire\Component;

class Table extends Component
{
    public $program;

    // FORM REALISASI
    public $triwulan, $capaian, $satuan;

    // Model Form
    public $kode, $kegiatan, $pegawai_id;

    public function mount($program){
        $this->program = $program;
    }

    public function render()
    {
        $data['kegiatans'] = Kegiatan::orderBy('kode', 'ASC')->where('program_id', $this->program->id)->get();
        return view('livewire.realisasi.kegiatan.table', $data);
    }

    public function store($uuid)
    {
        $this->validate([
            'triwulan' => 'required|string|in:I,II,III,IV',
            'capaian' => 'required|string',
        ]);

        $kegiatan = Kegiatan::where('uuid', $uuid)->first();

        $data = [
            'kegiatan_id' => $kegiatan->id,
            'uuid' => str()->uuid(),
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
        ];

        RealisasiKegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan realisasi triwulan <b>' . $this->triwulan . '</b> kedalam Kegiatan <b>' . $kegiatan->title . '</b>');
        $this->reset(['triwulan', 'capaian', 'satuan']);
    }

    public function update($uuid, $field, $value)
    {
        RealisasiKegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroy($uuid)
    {
        $data = RealisasiKegiatan::where('uuid', $uuid)->first();
        $data->delete();
    }
}
