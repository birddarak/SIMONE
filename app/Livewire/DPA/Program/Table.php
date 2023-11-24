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
    public $pegawai_id, $kode, $program, $target, $satuan;

    public $indikator = [];

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        if (auth()->user()->rule == 'kabid') {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('pegawai_id', auth()->user()->pegawai->id)
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::where('id', auth()->user()->pegawai->id)->get();
        } else {

            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::all();
        }
        return view('livewire.d-p-a.program.table', $data);
    }


    public function storeProgram()
    {
        $this->validate([
            'pegawai_id' => 'required|string',
            'kode' => 'required|string',
            'program' => 'required|string',
            'tahun_anggaran' => 'required|string',
            'apbd' => 'required|string|in:murni,perubahan',
            'target' => 'required|string',
            'satuan' => 'required|string',
        ]);

        $pegawai = Pegawai::where('uuid', $this->pegawai_id)->first();
        $data = [
            'uuid' => str()->uuid(),
            'pegawai_id' => $pegawai->id,
            'kode' => $this->kode,
            'title' => $this->program,
            'tahun_anggaran' => $this->tahun_anggaran,
            'apbd' => $this->apbd,
            'target' => $this->target,
            'satuan' => $this->satuan
        ];

        Program::create($data);

        session()->flash('message', 'Berhasil menambahkan <b>' . $this->program . '</b> kedalam Program');
        $this->reset(['pegawai_id', 'kode', 'program', 'target', 'satuan']);
    }

    public function storeIndikator(Program $program)
    {
        if (empty($this->indikator)) {
            $this->indikator[$program->uuid] = null;
        }

        $this->validate([
            'indikator.' . $program->uuid => 'required|string',
        ]);

        $data = [
            'uuid' => str()->uuid(),
            'program_id' => $program->id,
            'title' => $this->indikator[$program->uuid],
        ];

        IndikatorProgram::create($data);

        session()->flash('message', 'Berhasil menambahkan Indikator <b>' . $this->indikator[$program->uuid] . '</b>');
        $this->reset(['indikator']);
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
