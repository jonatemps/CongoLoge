<?php

namespace App\Http\Controllers;

use App\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function show($slug){
        $bien = Bien::where('slug',$slug)->first();
        $arrayPrice = ['min' => $bien->price - 30,'max' => $bien->price + 30];

        $biens = Bien::with(['categories','commune'])
                        ->where('id','<>',$bien->id)
                        ->whereBetween('price',[$arrayPrice['min'],$arrayPrice['max']])
                        // ->where('commune_id',$bien->commune_id)
                        ->whereHas('commune',function($query)use($bien){
                            $query->where('ville_id',$bien->commune->ville_id);
                            // $query->orWhere('commune_id',$this->commune);
                        })
                        ->take(3)->get();
        // dd($biens);
        return view('biens.show',[
            'bien' => $bien,
            'biens' => $biens
        ]);
    }
}
