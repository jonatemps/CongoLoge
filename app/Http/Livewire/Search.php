<?php

namespace App\Http\Livewire;

use App\Category;
use App\Commune;
use App\Ville;
use Livewire\Component;

class Search extends Component
{

    private $biens;
    public $categories;
    public $villes;
    public $communes;
    public $cat;
    public $ville;
    public $commune;
    public $price;


    public function mount()
    {
        $this->categories = Category::all();
        $this->villes = Ville::all();
        $this->communes = Commune::with('ville')->orderBy('ville_id')->orderBy('name')->get();

    }


    public function ville()
    {
        if ($this->ville !='Toute ville' && $this->ville !='') {
            $this->communes = Commune::with('ville')->where('ville_id',$this->ville)->orderBy('ville_id','DESC')->get();
        } else {
            $this->communes = Commune::all();
        }

    }
    public function render()
    {
        return view('livewire.search');
    }
}
