<?php

namespace App\Http\Livewire;

use App\Events\Messagesend;
use App\Message;
use App\User;
use Carbon\Carbon;
use Livewire\Component;

class Bavarder extends Component
{
    protected $listeners = ['chatWith','messageReceved'];
    public $messages;
    public $user;
    public $text;
    public $authUser;
    public $users;

    public function mount(){
        // $user = User::find($id);
        // $this->messages = $this->conversation($user->id);
        $this->users = User::latest()->where('id','!=',auth()->user()->id)->get();
        $this->text = '';
    }

    public function chatWith($id)
    {
        $this->user = User::findOrFail($id);
        Message::where('from',$id)->where('to',auth()->user()->id)->update(['read_at' => Carbon::now()]);
        $this->messages = Message::where(function($q) use($id){
            $q->where('from',auth()->user()->id);
            $q->where('to',$id);
        })->orWhere(function($q) use($id){
            $q->where('from',$id);
            $q->where('to',auth()->user()->id);
        })->with('user')->get();

        $this->emit('unreadCount');
        // return $this->messages;
    }

    public function sendMessage($id){
        $this->validate([
            'text' => 'required|min:3'
        ]);
        $messages = Message::create([
            'from' => auth()->user()->id,
            'to' => $id,
            'message' => $this->text,
            'type' => 0,
            'created_at' => Carbon::now()
        ]);
        $this->text= '';
        broadcast(new Messagesend($messages));
        $this->chatWith($id);

    }

    public function messageReceved($userId){
        if (isset($this->user)) {
            if ($this->user->id == $userId) {
                $this->chatWith($userId);
            }
        }
        $this->emit('unreadCount');
    }

    public function render()
    {
        return view('livewire.bavarder');
    }
}
