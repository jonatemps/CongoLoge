<?php

namespace App\Http\Livewire;

use App\Addsignal;
use App\Category;
use App\Commune;
use App\Ville;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignalAdd extends Component
{
    use WithFileUploads;


    public  $categories;
    public  $communes;
    public  $villes;
    public  $nameProp,
            $phoneProp,
            $adressProp,
            $userId,
            $category,
            $image,
            $ville,
            $commune,
            $chambre,
            $cuisine,$baignoire,$garage,$adress,$prix,$detail,$destination;


    public function mount(){
        $this->categories = Category::all();
        $this->communes = Commune::all();
        $this->villes = Ville::all();
        $this->detail = $this->detail ??'';
    }

    public function updatedville($value){
        $this->communes = Commune::with('ville')
                        ->whereHas('ville',function($query) use($value){
                            $query->where('name',$value);
                        })->get();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nameProp' =>  'required|string|min:3',
            'phoneProp' =>'required|starts_with:8,9|digits:9',
            'adressProp' =>'required|string|min:6',
            'category' =>'required|string',
            'destination' => 'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg|max:1024',
            'ville' =>'required|string',
            'commune' => 'required|string',
            'chambre' =>'required',
            'cuisine' =>'required',
            'baignoire' =>'required',
            'garage' =>'required',
            'adress' =>'required|min:6',
            'prix' =>'required|integer',
            'detail' =>'string|min:3',
        ]);
    }

    public function signal(){
        if (Auth::check()) {
            // dd('ok');
            $validatedData = $this->validate([
                'category' =>'required|string',
                'category' =>'required|string',
                'destination' => 'required|string',
                'image' =>'required|image|mimes:jpeg,png,jpg|max:1024',
                'ville' =>'required|string',
                'commune' => 'required|string',
                'chambre' =>'required',
                'cuisine' =>'required',
                'baignoire' =>'required',
                'garage' =>'required',
                'adress' =>'required',
                'prix' =>'required|integer',
                'detail' =>'string|min:3'
            ]);
        } else {
            $validatedData = $this->validate([
                'nameProp' => 'required|string|min:3',
                'phoneProp' =>'required|starts_with:8,9|digits:9',
                'adressProp' =>'required|string',
                'category' =>'required|string',
                'destination' => 'required|string',
                'image' =>'image|mimes:jpeg,png,jpg|max:1024',
                'ville' =>'required|string',
                'commune' => 'required|string',
                'chambre' =>'required',
                'cuisine' =>'required',
                'baignoire' =>'required',
                'garage' =>'required',
                'adress' =>'required',
                'prix' =>'required|integer',
                'detail' =>'string|min:3'
            ]);
        }

        $name = md5($this->image . microtime()).'.'.$this->image->extension();

        $this->image->storeAs('signals', $name);
        // dd($this->destination);
        if (Auth::check()) {
            Addsignal::create([
                'userId' =>Auth::user()->id,
                'category' => $this->category,
                'destination' => $this->destination,
                'image' => $name,
                'ville' => $this->ville,
                'commune' =>  $this->commune,
                'chambre' => $this->chambre,
                'cuisine' => $this->cuisine,
                'baignoire' => $this->baignoire,
                'garage' => $this->garage,
                'adress' => $this->adress,
                'prix' => $this->prix,
                'detail' => $this->detail
            ]);
        } else {
            Addsignal::create([
                'nameProp' => $this->nameProp,
                'phoneProp' =>$this->phoneProp,
                'adressProp' =>$this->adressProp,
                'category' =>$this->category,
                'destination' => $this->destination,
                'image' => $name,
                'ville' => $this->ville,
                'commune' =>  $this->commune,
                'chambre' => $this->chambre,
                'cuisine' => $this->cuisine,
                'baignoire' => $this->baignoire,
                'garage' => $this->garage,
                'adress' => $this->adress,
                'prix' => $this->prix,
                'detail' => $this->detail
            ]);
        }

        session()->flash('succes', 'Votre propriété a été signalée avec succes ! Après examen, nous vous contacterons. Merci de votre collaboration !');

        return redirect()->to('/signalAdd');

        // return redirect('home')->with('error',"Tu n'as pas accès à cette page.");

        // session()->flash('succes', 'Votre propriété a été signalée avec succes ! Après examen, nous vous contacterons. Merci de votre collaboration !');

    }

    public function render()
    {
        return view('livewire.signal-add');
    }
}
