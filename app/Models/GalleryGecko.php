<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryGecko extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gecko_id',
        'url',
    ];

    public function gecko()
    {
        $this->belongsTo(Gecko::class, 'gecko_id');
    }
}
