<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Message extends Model
{
    protected $fillable = [
        'message','from','to','type','read_at' ,'created_at'
    ];

    protected $dates = ['read_at' ,'created_at'];

    public $timestamps = false;

    public function formatDate(){
        $date = $this->created_at;
        return Carbon::parse($date)->diffForHumans();
    }



    public function user()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'from', 'id');
    }
}
