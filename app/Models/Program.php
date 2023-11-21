<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function indikator_program(){
        return $this->hasMany(IndikatorProgram::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function realisasi_program()
    {
        return $this->hasMany(RealisasiProgram::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function sumTotalSubKeg(){
        return $this->kegiatan->flatMap(function ($kegiatan){
            return $kegiatan->subkegiatan->pluck('pagu_awal');
        })->sum();
    }
}
