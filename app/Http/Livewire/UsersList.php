<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UsersList extends Component
{
    protected $listeners = ['selectUser','unreadCount' => 'mount'];

    public $users;
    public $userSelectedId;

    public function mount(){
        $this->users = User::latest()->where('id','!=',auth()->user()->id)->get();
    }
    public function selectUser($id){
        $this->userSelectedId = $id;
        $this->emit('chatWith',$id);
    }
    public function render()
    {
        return view('livewire.users-list');
    }
}
