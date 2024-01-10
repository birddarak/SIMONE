<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    use Cloneable;

    protected $guarded = ['id'];

    protected $cloneable_relations = ['indikator_kegiatan', 'subkegiatan', 'realisasi_kegiatan'];
    protected $clone_exempt_attributes = ['uuid'];

    public function onCloning(){
        $this->uuid = str()->uuid();
    }

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

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function triwulan($value)
    {
        return $this->realisasi_kegiatan()->where('triwulan', $value)->get()->first();
    }

    public function countTotalCapaian($value)
    {
        return $this->realisasi_kegiatan->where('triwulan', $value)->sum('capaian');
    }

    public function sumTotalSubKeg()
    {
        return $this->subkegiatan->sum('pagu');
    }

    public function sumTotalRincian($value)
    {
        return $this->subkegiatan->flatMap(function ($subkegiatan) use ($value) {
            return $subkegiatan->realisasi_subkegiatan->where('triwulan', $value)->flatMap(function ($realisasi_subkegiatan) use ($value) {
                return $realisasi_subkegiatan->rincian_belanja->pluck('pagu');
            });
        })->sum();
    }

    public function sumTotal()
    {
        return ($this->sumTotalRincian("I") +
            $this->sumTotalRincian("II") + $this->sumTotalRincian("III") +
            $this->sumTotalRincian("IV"));
    }
}
