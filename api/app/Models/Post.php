<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
        return $this->belongsTo('App\Models\Author');
    }
}
