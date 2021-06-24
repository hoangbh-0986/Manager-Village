<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'craft_village_id',
        'image',
    ];

    public function craftVillages()
    {
        return $this->belongsTo('App\Models\CraftVillage', 'craft_village_id');
    }
}
