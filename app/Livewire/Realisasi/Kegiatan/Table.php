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

    public function mount($program)
    {
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
            'capaian' => 'required|integer',
        ]);

        $kegiatan = Kegiatan::where('uuid', $uuid)->first();

        $data = [
            'kegiatan_id' => $kegiatan->id,
            'uuid' => str()->uuid(),
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
        ];

        RealisasiKegiatan::create($data);

        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menambahkan Capaian Triwulan ' . $this->triwulan);
        $this->reset(['triwulan', 'capaian', 'satuan']);
    }

    public function update($uuid, $field, $value)
    {
        $data = RealisasiKegiatan::where('uuid', $uuid)->first();
        if ($field == 'capaian' && !is_numeric($value)) {
            $this->dispatch('alert', title: 'Gagal!', icon: 'warning', html: 'Terdapat karakter bukan angka atau spasi berlebih saat menginput ');
            return;
        }
        $data->update(
            [
                $field => $value
            ]
        );
        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil memperbaharui Capaian Triwulan ' . $data->triwulan);
    }

    public function destroy($uuid)
    {
        $data = RealisasiKegiatan::where('uuid', $uuid)->first();
        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menghapus Triwulan ' . $data->triwulan);
        $data->delete();
    }
}
