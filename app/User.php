<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','firstName','phone','sexe','email', 'password', 'google_id','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
        return $this->hasMany(Message::class,'from');
    }

    public function unread(){
        $userId = $this->id;
        if (Auth::user()) {
            return Message::where('read_at',NULL)
                        ->where('from',$userId)
                        ->where('to', Auth::user()->id)
                        ->count();
        }
    }

    public function allMessages(){
        $userId = $this->id;
        return Message::where(function($q) use($userId){
                            $q->where('from',auth()->user()->id);
                            $q->where('to',$userId);
                        })->orWhere(function($q) use($userId){
                            $q->where('from',$userId);
                            $q->where('to',auth()->user()->id);
                        })->count();
    }

    public function myUnread(){
        return Message::where('read_at',NULL)
                        ->where('to', Auth::user()->id)
                        ->count();
    }

}
