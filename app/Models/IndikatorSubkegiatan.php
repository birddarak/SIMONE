<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorSubkegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subkegiatan()
    {
        return $this->belongsTo(Subkegiatan::class);
    }
}
