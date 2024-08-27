<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Egg extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tanggal_inkubasi',
        'keterangan',
        'perkawinan',
    ];

    public function galleryEggs()
    {
        return $this->hasOne(GalleryEgg::class, 'egg_id');
    }
}
