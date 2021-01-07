<?php

namespace App\Http\Livewire;

use App\Bien;
use App\Like;
use App\LikeNotAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Header extends Component
{
    public $totalLikes,$mylikes;

    protected $listeners = ['like'];

    public function mount(){
        $this->totalLikes = $this->likesCount();

    }

    public function like($bienId){
        if (Auth::check()) {
            $isLike = Like::where('bienId',$bienId)->where('userId',Auth::user()->id)->value('id');
            //    dd($isLike);
            if (Auth::user()) {
                if ($isLike) {
                    $like = Like::find($isLike);
                    $like->delete();
                }else {
                    Like::create([
                        'userId' => Auth::user()->id,
                        'bienId' => $bienId,
                    ]);

                    session()->flash('succes', 'La propriété a bien été ajouttée dans la lise de vos favoris !😍');
                }
            }
        } else {

            return redirect()->route('login');
        }

        $this->totalLikes = $this->likesCount();
    }

    public function likesCount(){
        if (Auth::user()) {
            $likes =like::where('userId',Auth::user()->id)->get();

            if ($likes) {
                return $likes->count();
            } else {
            return 0;
            }
        }

    }

    public function favoriteBien(){
        $biens = Bien::with('isLike')
                                        // ->whereHas('commune',function($query){
                                        //     $query->where('ville_id',$this->ville);
                                        // })
                                        // ->orWhere('commune_id',$this->commune)
                                        ->orderBy('created_at','DESC')->paginate(6);
        dd($biens);
    }

    public function render()
    {
        return view('livewire.header');
    }
}
