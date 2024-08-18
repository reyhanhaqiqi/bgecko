<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gecko extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'tipe',
        'jenis_kelamin',
        'kelahiran',
        'deskripsi',
        'perkawinan'
    ];

    public function galleryGeckos()
    {
        return $this->hasMany(GalleryGecko::class, 'gecko_id');
    }
}
