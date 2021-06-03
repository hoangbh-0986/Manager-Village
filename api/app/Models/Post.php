<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'craft_village_id',
        'job_id',
        'expert_id',
    ];

    public function expert()
    {
        return $this->belongsTo('App\Models\Expert');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function craftVillage()
    {
        return $this->belongsTo('App\Models\CraftVillage');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function ward()
    {
        return $this->belongsTo('App\Models\Ward');
    }

    public function shortContent(): String
    {
      return substr($this->content, 0, 250);
    }
}
