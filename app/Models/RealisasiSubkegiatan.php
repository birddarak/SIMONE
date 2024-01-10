<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiSubkegiatan extends Model
{
    use HasFactory;
    use Cloneable;

    protected $guarded = ['id'];

    protected $cloneable_relations = ['rincian_belanja'];
    protected $clone_exempt_attributes = ['uuid'];

    public function onCloning(){
        $this->uuid = str()->uuid();
    }

    public function subkegiatan()
    {
        return $this->belongsTo(Subkegiatan::class);
    }

    public function rincian_belanja()
    {
        return $this->hasMany(RincianBelanja::class);
    }
}
