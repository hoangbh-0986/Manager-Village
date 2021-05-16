<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufactureFactory extends Model
{
    use HasFactory;

    public function craftVillage()
    {
        return $this->belongsTo('App\Models\CraftVillage');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
