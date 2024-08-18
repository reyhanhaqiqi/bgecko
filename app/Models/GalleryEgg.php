<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryEgg extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'egg_id',
        'url',
    ];

    public function egg()
    {
        $this->belongsTo(Egg::class, 'egg_id');
    }
}
