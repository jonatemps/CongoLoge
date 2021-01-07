<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }
}
