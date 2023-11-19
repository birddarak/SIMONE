<?php

namespace App\Livewire\DPA\Program;

use App\Models\IndikatorProgram;
use App\Models\Pegawai;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    // Model Filter
    public  $tahun_anggaran = '2023', $apbd = 'murni';

    // Model Form
    public $kode, $program, $pegawai_id;

    public $indikator = [], $target = [], $satuan = [];

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        $data['programs'] = Program::orderBy('id', 'DESC')
            ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.program.table', $data);
    }


    public function storeProgram()
    {
        $this->validate([
            'tahun_anggaran' => 'required|string',
            'apbd' => 'required|string|in:murni,perubahan',
            'kode' => 'required|string',
            'program' => 'required|string',
            'pegawai_id' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();
        $data = [
            'uuid' => str()->uuid(),
            'kode' => $this->kode,
            'title' => $this->program,
            'pegawai_id' => $pegawai->id,
            'tahun_anggaran' => $this->tahun_anggaran,
            'apbd' => $this->apbd,
            'pagu_awal' => 0,
            'pagu_akhir' => 0
        ];

        Program::create($data);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->program . '</b> kedalam Program');
        $this->reset(['kode', 'program', 'pegawai_id']);
    }

    public function storeIndikator(Program $program)
    {
        if (empty($this->indikator)) {
            $this->indikator[$program->uuid] = null;
        }
        if (empty($this->target)) {
            $this->target[$program->uuid] = null;
        }
        if (empty($this->satuan)) {
            $this->satuan[$program->uuid] = null;
        }

        $this->validate([
            'indikator.' . $program->uuid => 'required|string',
            'target.' . $program->uuid => 'required|string',
            'satuan.' . $program->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'program_id' => $program->id,
            'title' => $this->indikator[$program->uuid],
            'target' => $this->target[$program->uuid],
            'satuan' => $this->satuan[$program->uuid],
        ];

        IndikatorProgram::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$program->uuid] . '</b>');
        $this->reset(['indikator', 'target', 'satuan']);
    }

    public function updateProgram($uuid, $field, $value)
    {
        $pegawai = ($field == 'pegawai_id') ? Pegawai::where('uuid', $value)->first() : null;
        Program::where('uuid', $uuid)
            ->update(
                [
                    $field => (is_null($pegawai)) ? $value : $pegawai->id
                ]
            );
    }

    public function updateIndikator($uuid, $field, $value)
    {
        IndikatorProgram::where('uuid', $uuid)
            ->update([
                $field => $value
            ]);
    }

    public function destroyProgram($uuid)
    {
        Program::where('uuid', $uuid)->delete();
    }

    public function destroyIndikator($uuid)
    {
        IndikatorProgram::where('uuid', $uuid)->delete();
    }
}
