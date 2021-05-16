<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCraftVillage extends Model
{
    use HasFactory;

    public function craftVillage()
    {
        return $this->belongsTo('App\Models\CraftVillage', 'craft_village_id');
    }
}
