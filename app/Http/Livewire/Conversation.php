<?php

namespace App\Http\Livewire;

use App\Events\Messagesend;
use App\Message;
use App\User;
use Carbon\Carbon;
use Livewire\Component;

class Conversation extends Component
{
    public $messages;
    public $user;
    public $message;
    public $authUser;
    public $users;

    public function mount($id){
        $user = User::find($id);
        // $this->messages= [];
        $this->messages = $this->conversation($user->id);
        // $this->message= '';
        $this->users = User::latest()->where('id','!=',auth()->user()->id)->get();

    }


    protected $listeners = ['conversation'];
    // public function getListeners()
    // {
    //     $this->authUser = auth()->user();
    //     return [
    //         'conversation',
    //         // "echo-private:chat.{$this->authUser->id},Messagesend" => 'messageReceved'
    //     ];
    // }

    // protected $listeners = ['selectUser'];




    public function selectUser($id){
        $this->emit('conversation',$id);
    }
    public function conversation($id)
    {
        $this->user = User::findOrFail($id);
        $this->messages = Message::where(function($q) use($id){
            $q->where('from',auth()->user()->id);
            $q->where('to',$id);
        })->orWhere(function($q) use($id){
            $q->where('from',$id);
            $q->where('to',auth()->user()->id);
        })->with('user')->get();

        return $this->messages;
    }

    public function sendMessage($id){
        $this->validate([
            'message' => 'required|min:3'
        ]);
        $messages = Message::create([
            'from' => auth()->user()->id,
            'to' => $id,
            'message' => $this->message,
            'type' => 0,
            'created_at' => Carbon::now()
        ]);
        broadcast(new Messagesend($messages));
        $this->conversation($id);
        $this->message= '';
    }

    public function messageReceved(array $event){
       $this->conversation($event['from']);
    }

    public function render()
    {
        return view('livewire.conversation');
    }
}
