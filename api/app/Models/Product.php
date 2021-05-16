<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function manufactureFactory()
    {
        return $this->belongsTo('App\Models\ManufactureFactory');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }
}
