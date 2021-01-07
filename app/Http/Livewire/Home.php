<?php

namespace App\Http\Livewire;

use App\Bien;
use Livewire\Component;

class Home extends Component
{
    public $biens;

    public function mount(){
        $this->biens = Bien::where('En_vedette',1)->orderBy('created_at','DESC')->take(6)->get();
    }


    public function render()
    {
        return view('livewire.home');
    }
}
