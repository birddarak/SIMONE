<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiSubkegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subkegiatan()
    {
        return $this->hasMany(Subkegiatan::class);
    }
}
