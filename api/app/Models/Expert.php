<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year_of_birth',
        'year_died',
        'craft_village_id',
        'job_id',
    ];

    public function craftVillage()
    {
        return $this->belongsTo('App\Models\CraftVillage');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function heir()
    {
        return $this->hasMany('App\Models\Heir');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function award()
    {
        return $this->belongsToMany('App\Models\ExpertAward', 'expert_awards', 'expert_id', 'award_id');
    }
}
