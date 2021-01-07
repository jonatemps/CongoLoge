<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;


class Bien extends Model
{
    use Resizable;

    public function getPrice()
    {
        $price=$this->price;
        return number_format($price,2,',',' ') . ' $';
    }

    public function formatDate(){
        $date = $this->created_at;
        return Carbon::parse($date)->diffForHumans();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        parent::save();
    }

    public function authorId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'author_id', 'id');
    }

    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }


    public function isLike(){
        $bienId = $this->id;
        if (Auth::user()) {
            $like =Like::where('bienId',$bienId)->where('userId',Auth::user()->id)->value('id');

            if ($like) {
                return true;
            }else {
                return  false;
            }
        }
    }

    // public function likes(){
    //     return $this->belongsTo(Like::class,'id');
    // }

}
