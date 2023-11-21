<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function indikator_subkegiatan()
    {
        return $this->hasMany(IndikatorSubkegiatan::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function realisasi_subkegiatan()
    {
        return $this->hasMany(RealisasiSubkegiatan::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function triwulan($value){
        return $this->realisasi_subkegiatan()->where('triwulan', $value)->get()->first();
    }
}
