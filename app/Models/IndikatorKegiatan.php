<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKegiatan extends Model
{
    use HasFactory;
    use Cloneable;

    protected $guarded = ['id'];
    protected $clone_exempt_attributes = ['uuid'];

    public function onCloning(){
        $this->uuid = str()->uuid();
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
