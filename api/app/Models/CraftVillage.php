<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftVillage extends Model
{
    use HasFactory;

    public function ward()
    {
        return $this->belongsTo('App\Models\Ward');
    }

    public function detailCaftVillage()
    {
        return $this->hasOne('App\Models\DetailCraftVillage', 'craft_village_id');
    }

    public function manufactureFactory()
    {
        return $this->hasMany('App\Models\ManufactureFactory');
    }

    public function expert()
    {
        return $this->hasMany('App\Models\Expert');
    }

    public function job()
    {
        return $this->belongsToMany('App\Models\Job', 'craft_village_jobs', 'craft_village_id', 'job_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
