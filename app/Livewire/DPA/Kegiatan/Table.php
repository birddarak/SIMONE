<?php

namespace App\Livewire\DPA\Kegiatan;

use App\Models\IndikatorKegiatan;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{

    public $program;

    public $kode, $kegiatan, $pegawai_id;

    public $indikator = [], $target = [], $satuan = [];

    public function mount($program)
    {
        $this->program = $program;
    }

    public function render()
    {
        $data['program'] = Program::where('uuid', $this->program->uuid)->first();
        $data['kegiatans'] = Kegiatan::orderBy('id', 'DESC')
            ->where('program_id', $this->program->id)
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.kegiatan.table', $data);
    }

    public function storeKegiatan()
    {
        $this->validate([
            'kode' => 'required|string|max:100',
            'kegiatan' => 'required|string',
            'pegawai_id' => 'required|exists:pegawais,uuid',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();

        Kegiatan::create([
            'uuid' => str()->uuid(),
            'program_id' => $this->program->id,
            'pegawai_id' => $pegawai->id,
            'kode' => $this->kode,
            'title' => $this->kegiatan,
            'pagu_awal' => 0,
            'pagu_akhir' => 0,
        ]);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->kegiatan . '</b> kedalam Kegiatan');
        $this->reset(['kode', 'kegiatan', 'pegawai_id']);
    }

    public function storeIndikator(Kegiatan $kegiatan){
        if (empty($this->indikator)) {
            $this->indikator[$kegiatan->uuid] = null;
        }
        if (empty($this->target)) {
            $this->target[$kegiatan->uuid] = null;
        }
        if (empty($this->satuan)) {
            $this->satuan[$kegiatan->uuid] = null;
        }

        $this->validate([
            'indikator.' . $kegiatan->uuid => 'required|string',
            'target.' . $kegiatan->uuid => 'required|string',
            'satuan.' . $kegiatan->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'kegiatan_id' => $kegiatan->id,
            'title' => $this->indikator[$kegiatan->uuid],
            'target' => $this->target[$kegiatan->uuid],
            'satuan' => $this->satuan[$kegiatan->uuid],
        ];

        IndikatorKegiatan::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$kegiatan->uuid] . '</b>');
        $this->reset(['indikator', 'target', 'satuan']);
    }

    public function updateKegiatan($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Kegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function updateIndikator($uuid, $field, $value)
    {
        IndikatorKegiatan::where('uuid', $uuid)
            ->update(
                [
                    $field => $value
                ]
            );
    }

    public function destroyKegiatan($uuid)
    {
        Kegiatan::where('uuid', $uuid)->delete();
    }

    public function destroyIndikator($uuid)
    {
        IndikatorKegiatan::where('uuid', $uuid)->delete();
    }
}
