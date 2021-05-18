<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year_create',
        'ancestor',
        'note',
    ];

    public function ward()
    {
        $this->belongsto('App\Models\Ward');
    }

    public function craftVillage()
    {
        return $this->belongsToMany('App\Models\CraftVillage');
    }

    public function products()
    {
        return $this->hasMAny('App\Models\Product');
    }

    public function expert()
    {
        return $this->hasMAny('App\Models\Expert');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
