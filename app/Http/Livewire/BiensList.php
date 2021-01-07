<?php

namespace App\Http\Livewire;

use App\Bien;
use App\Category;
use App\Commune;
use App\Like;
use App\signal;
use App\User;
use App\Ville;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BiensList extends Component
{
    use WithPagination;

    private $biens;
    public $categories;
    public $villes;
    public $communes;
    public $cat;
    public $ville;
    public $commune;
    public $price;
    public $arrayPrice;
    public $bienLikeId;
    public $perPage = 6;

    protected $listeners = ['search','favoriteBien','load-more' => 'loadMore'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->villes = Ville::all();
        $this->communes = Commune::with('ville')->orderBy('ville_id')->orderBy('name')->get();
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 6;
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function updatedprice($value)
    {

        if ($this->price < 301 && $this->price != "Tout prix") {
            // dd($this->price);
            $this->arrayPrice = ['min' => $this->price - 50,'max' => $this->price];
            // dd($this->arrayPrice);
        } elseif ($this->price > 300) {
            $this->arrayPrice = ['min' => $this->price,'max' => 1000000];
            // dd($this->arrayPrice);
        }
        // ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
    }


    public function updatedville()
    {
        // dd('ok');
        if ($this->ville !='Toute ville' && $this->ville !='') {
            $this->communes = Commune::with('ville')->where('ville_id',$this->ville)->orderBy('ville_id','DESC')->orderBy('name')->get();
        } else {
            $this->communes = Commune::all();
        }

        $this->commune = '';

    }

    public function search(){
        if ($this->commune || $this->price || $this->cat || $this->ville) {
            if (($this->commune !='Toute commune' && $this->commune !='') && ($this->price !='Tout prix' && $this->price !='') && ($this->cat !='Tout categorie' && $this->cat !='')) {
                $this->biens = Bien::with('categories')
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->where('commune_id',$this->commune)
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
                            // dd($this->biens);
            }elseif (($this->price !='Tout prix' && $this->price !='') && ($this->cat !='Tout categorie' && $this->cat !='') && ($this->ville !='Toute ville' && $this->ville !='')) {
                $this->biens = Bien::with(['categories','commune'])
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                // $query->orWhere('commune_id',$this->commune);
                            })
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orWhere('commune_id',$this->commune)
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->commune !='Toute commune' && $this->commune !='') && ($this->price !='Tout prix' && $this->price !='')) {
                $this->biens = Bien::with('categories')
                            ->where('commune_id',$this->commune)
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->commune !='Toute commune' && $this->commune !='') && ($this->cat !='Tout categorie' && $this->cat !='')) {
                $this->biens = Bien::with('categories')
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->where('commune_id',$this->commune)
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->price !='Tout prix' && $this->price !='') && ($this->cat !='Tout categorie' && $this->cat !='')) {
                $this->biens = Bien::with('categories')
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->cat !='Tout categorie' && $this->cat !='') && ($this->ville !='Toute ville' && $this->ville !='')) {
                $this->biens = Bien::with('categories')
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                $query->orWhere('commune_id',$this->commune);
                            })
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->price !='Tout prix' && $this->price !='') && ($this->ville !='Toute ville' && $this->ville !='')) {
                $this->biens = Bien::with('categories')
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                $query->orWhere('commune_id',$this->commune);
                            })
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->price !='Tout prix' && $this->price !='')) {
                $this->biens = Bien::with('categories')
                            ->whereBetween('price',[$this->arrayPrice['min'],$this->arrayPrice['max']])
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif (($this->commune !='Toute commune' && $this->commune !='')) {
                $this->biens = Bien::with('categories')
                            ->where('commune_id',$this->commune)
                            ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif ($this->cat !='Tout categorie' && $this->cat !='') {
                $this->biens = Bien::with('categories')
                                        ->whereHas('categories',function($query){
                                            $query->where('slug',$this->cat);
                                        })
                                        ->orderBy('created_at','DESC')->paginate($this->perPage);
            }elseif ($this->ville !='Toute ville' && $this->ville !='') {
                $this->biens = Bien::with(['categories','commune'])
                                        ->whereHas('commune',function($query){
                                            $query->where('ville_id',$this->ville);
                                        })
                                        ->orWhere('commune_id',$this->commune)
                                        ->orderBy('created_at','DESC')->paginate($this->perPage);
            }else {
                $this->biens = Bien::with('categories')->orderBy('created_at','DESC')->paginate($this->perPage);
            }
        }else {
            $this->biens = Bien::with(['categories','commune','authorId'])
                                ->orderBy('created_at','DESC')->paginate($this->perPage);

        }
        return $this->biens;
    }

    public function favoriteBien(){
        $this->biens = Bien::with('isLike')
                                        // ->whereHas('commune',function($query){
                                        //     $query->where('ville_id',$this->ville);
                                        // })
                                        // ->orWhere('commune_id',$this->commune)
                                        ->orderBy('created_at','DESC')->paginate(6);
        dd($this->biens);
    }

    public function render()
    {
        return view('livewire.biens-list',[
            'biens' => $this->search()
        ]);
    }
}
