<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function biens()
    {
        return $this->belongsToMany('App\Bien');
    }
}
