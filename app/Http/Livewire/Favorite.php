<?php

namespace App\Http\Livewire;

use App\Bien;
use Livewire\Component;

class Favorite extends Component
{
    public $biens;

    // protected $listeners = ['refresh' => 'mount'];

    public function mount(){
        $this->biens = Bien::
                            orderBy('created_at','DESC')->get();
        // dd($this->biens);
    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
