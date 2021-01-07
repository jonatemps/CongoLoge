<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Team extends Component
{
    protected $listeners = ['selectUser'];

    public function selectUser($id){
        dd($id);
        redirect()->to('/chat/'.$id);
        // $this->emit('conversation',$id);
    }

    public function render()
    {
        return view('livewire.team',[
            'users' => User::where('role_id',1)->get()
        ]);
    }
}
