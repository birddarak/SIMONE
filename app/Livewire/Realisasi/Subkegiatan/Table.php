<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use Livewire\Component;
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
            'capaian' => 'required|integer',
        ]);

        $subkegiatan = Subkegiatan::where('uuid', $uuid)->first();

        $data = [
            'subkegiatan_id' => $subkegiatan->id,
            'uuid' => str()->uuid(),
            'triwulan' => $this->triwulan,
            'capaian' => $this->capaian,
        ];

        RealisasiSubkegiatan::create($data);

        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menambahkan Capaian Triwulan ' . $this->triwulan);
        $this->reset(['triwulan', 'capaian', 'satuan']);
    }

    public function update($uuid, $field, $value)
    {
        $data = RealisasiSubkegiatan::where('uuid', $uuid)->first();
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
        $data = RealisasiSubkegiatan::where('uuid', $uuid)->first();
        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menghapus Triwulan ' . $data->triwulan);
        $data->delete();
    }
}
