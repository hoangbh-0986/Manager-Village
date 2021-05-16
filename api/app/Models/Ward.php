<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    public function craftVillages()
    {
        return $this->hasMany('App\Models\CraftVillage');
    }
}
