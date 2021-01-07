<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class signal extends Model
{
    protected $fillable = [
        'nameProp', 'phoneProp', 'adressProp','userId','category','image','ville','commune','chambre','cuisine','baignoire','garage','adress','prix','detail',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','userId');
    }
}
