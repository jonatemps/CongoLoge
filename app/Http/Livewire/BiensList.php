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
    public $prixMin;
    public $prixMax;
    public $ville;
    public $commune;
    public $price;
    public $arrayPrice;
    public $bienLikeId;
    public $perPage = 6;
    public $destination ='Toute destination';
    public $order ='created_at';

    protected $listeners = ['search','favoriteBien','load-more' => 'loadMore'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->villes = Ville::all();
        $this->communes = Commune::with('ville')->orderBy('ville_id')->orderBy('name')->get();
    }

    public function show($id)
    {
        $bien = Bien::find($id);

        redirect('/show/'.$bien->slug);
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 6;
    }

    public function updatedorder($value)
    {
        dd($this->order);
    }

    public function updated()
    {
        $this->resetPage();
    }


    public function updatedville()
    {
        // dd('ok');
        if ($this->ville !='Toute ville' && $this->ville !='') {
            $this->communes = Commune::with('ville')->where('ville_id',$this->ville)->orderBy('ville_id', $this->order != '' ? 'DESC' : 'DESC')->orderBy('name')->get();
        } else {
            $this->communes = Commune::all();
        }

        $this->commune = '';

    }

    public function search(){

        if ($this->commune || $this->destination || $this->prixMin || $this->prixMin || $this->cat || $this->ville) {
            // dd(($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  );
            // dd(Bien::whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )->get());
            if (($this->commune !='Toute commune' && $this->commune !='') /* && ($this->prixMin  || $this->prixMax) */ && ($this->cat !='Toute categorie' && $this->cat !='')) {
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->where('commune_id',$this->commune)
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            // ->whereRowValues('destination',$this->destination)
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
                            // dd($this->biens);
            }elseif (($this->prixMin  || $this->prixMax) && ($this->cat !='Toute categorie' && $this->cat !='') && ($this->ville !='Toute ville' && $this->ville !='')) {
                $this->biens = Bien::with(['categories','commune'])
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                // $query->orWhere('commune_id',$this->commune);
                            })
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            ->orWhere('commune_id',$this->commune)
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif (($this->commune !='Toute commune' && $this->commune !='') /* && ($this->prixMin  || $this->prixMax) */) {
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->where('commune_id',$this->commune)
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif (($this->commune !='Toute commune' && $this->commune !='') && ($this->cat !='Toute categorie' && $this->cat !='')) {
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->where('commune_id',$this->commune)
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif (($this->prixMin  || $this->prixMax) && ($this->cat !='Toute categorie' && $this->cat !='')) {
                // dd($this->cat);
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif (($this->cat !='Toute categorie' && $this->cat !='') && ($this->ville !='Toute ville' && $this->ville !='')) {
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereHas('categories',function($query){
                                $query->where('slug',$this->cat);
                            })
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                $query->orWhere('commune_id',$this->commune);
                            })
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif (($this->prixMin  || $this->prixMax) && ($this->ville !='Toute ville' && $this->ville !='')) {
                dd('$this->prixMin');
                $this->biens = Bien::with('categories')
                            ->whereHas('commune',function($query){
                                $query->where('ville_id',$this->ville);
                                $query->orWhere('commune_id',$this->commune);
                            })
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif ($this->prixMin  || $this->prixMax) {
                // dd([$this->prixMin ?? 0,$this->prixMax != "" ? $this->prixMax : 1000000]);
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->whereBetween('price',[$this->prixMin !="" ? $this->prixMin : 0,$this->prixMax != "" ? $this->prixMax : 1000000])
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
                            // dd($this->biens->first());
            }elseif (($this->commune !='Toute commune' && $this->commune !='')) {
                $this->biens = Bien::with('categories')
                            ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                            ->where('commune_id',$this->commune)
                            ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif ($this->cat !='Toute categorie' && $this->cat !='') {
                // dd($this->cat);
                $this->biens = Bien::with('categories')
                                        ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                                        ->whereHas('categories',function($query){
                                            $query->where('slug',$this->cat);
                                        })
                                        ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }elseif ($this->ville !='Toute ville' && $this->ville !='') {
                $this->biens = Bien::with(['categories','commune'])
                                        ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                                        ->whereHas('commune',function($query){
                                            $query->where('ville_id',$this->ville);
                                        })
                                        ->orWhere('commune_id',$this->commune)
                                        ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }else {
                $this->biens = Bien::with('categories')
                                    ->whereIn('destination',($this->destination != 'Toute destination' && $this->destination != null ) ? [$this->destination] : ['VENTE','LOCATION']  )
                                    ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);
            }
        }else {
            dd('ok');
            $this->biens = Bien::with(['categories','commune','authorId'])
                                ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate($this->perPage);

        }
        return $this->biens;
    }

    public function favoriteBien(){
        $this->biens = Bien::with('isLike')
                                        // ->whereHas('commune',function($query){
                                        //     $query->where('ville_id',$this->ville);
                                        // })
                                        // ->orWhere('commune_id',$this->commune)
                                        ->orderBy($this->order, $this->order != 'created_at' ? 'ASC' : 'DESC')->paginate(6);
        dd($this->biens);
    }

    public function render()
    {
        return view('livewire.biens-list',[
            'biens' => $this->search()
        ]);
    }
}
