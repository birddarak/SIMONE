<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkegiatan extends Model
{
    use HasFactory;
    use Cloneable;

    protected $guarded = ['id'];

    protected $cloneable_relations = ['indikator_subkegiatan', 'realisasi_subkegiatan'];
    protected $clone_exempt_attributes = ['uuid'];

    public function onCloning(){
        $this->uuid = str()->uuid();
    }

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

    public function triwulan($value)
    {
        return $this->realisasi_subkegiatan()->where('triwulan', $value)->get()->first();
    }

    public function countTotalCapaian($value)
    {
        return $this->realisasi_subkegiatan->where('triwulan', $value)->sum('capaian');
    }

    public function sumTotalRincian($value)
    {
        return $this->realisasi_subkegiatan->where('triwulan', $value)->flatMap(function ($realisasi_subkegiatan) {
            return $realisasi_subkegiatan->rincian_belanja->pluck('pagu');
        })->sum();
    }

    public function sumTotal()
    {
        return ($this->sumTotalRincian("I") +
            $this->sumTotalRincian("II") + $this->sumTotalRincian("III") +
            $this->sumTotalRincian("IV"));
    }
}
