<?php

namespace App\Livewire\Realisasi\RincianBelanja;

use App\Models\RealisasiSubkegiatan;
use Livewire\Component;
use App\Models\RincianBelanja;
use Illuminate\Support\Facades\File;
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

    public function store()
    {

        $this->validate([
            'rincian' => 'required|string',
            'tanggal' => 'required',
            'pagu' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        // $realisasi_subkegiatan = RealisasiSubkegiatan::where('uuid', $this->realisasi_subkegiatan->uuid)->first();

        if (!is_null($this->file)) {
            $this->validate([
                'file' => 'required|file|mimes:pdf,docx|max:5120'
            ]);
            $file = $this->file->store('assets/sub-kegiatan/realisasi/rincian', 'public');
        } else {
            $file = NULL;
        }

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

        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menambahkan <b>' . $this->rincian . '</b>');
        $this->reset(['rincian', 'tanggal', 'pagu', 'keterangan', 'file']);
    }

    public function update($uuid, $field, $value)
    {
        $data = RincianBelanja::where('uuid', $uuid)->first();
        if ($field == 'pagu' && !filter_var($value, FILTER_VALIDATE_INT)) {
            $this->dispatch('alert', title: 'Gagal!', icon: 'warning', html: 'Terdapat karakter bukan bilangan bulat atau spasi berlebih saat menginput ');
            return;
        }
        $data->update(
            [
                $field => $value
            ]
        );
        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil memperbaharui Rincian');
    }

    public function destroy($uuid)
    {
        $data = RincianBelanja::where('uuid', $uuid)->first();
        File::delete('storage/' . $data->file);
        $this->dispatch('alert', title: 'Sukses!', icon: 'success', html: 'Berhasil menghapus ' . $data->rincian);
        $data->delete();
    }
}
