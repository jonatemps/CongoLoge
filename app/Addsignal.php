<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Addsignal extends Model
{
    protected $fillable = [
        'nameProp', 'phoneProp', 'adressProp','userId','category','destination','image','ville','commune','chambre','cuisine','baignoire','garage','adress','prix','detail',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','userId');
    }
}
