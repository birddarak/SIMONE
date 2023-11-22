<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function indikator_kegiatan()
    {
        return $this->hasMany(IndikatorKegiatan::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function realisasi_kegiatan()
    {
        return $this->hasMany(RealisasiKegiatan::class);
    }

    public function subkegiatan()
    {
        return $this->hasMany(Subkegiatan::class);
    }

    public function pegawai() {
        return $this->belongsTo(Pegawai::class);
    }

    public function triwulan($value){
        return $this->realisasi_kegiatan()->where('triwulan', $value)->get()->first();
    }

    public function total_realisasi($value)
    {
        return $this->hasManyThrough(RealisasiSubkegiatan::class, Subkegiatan::class)->where('triwulan', $value);
    }
}
