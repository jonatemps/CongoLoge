<?php

namespace App\Http\Livewire;

use App\Events\Messagesend;
use App\Message;
use App\Repository\ChatRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ChatTeam extends Component
{
    use WithPagination;

    protected $listeners = ['chatWith','messageReceved'];
    private $messages;
    public $usr;
    public $text;
    public $authUser;
    public $users;

    private $r;
    private $auth;

    public function mount(ChatRepository $chatRepository,AuthManager $auth,$name){

        $this->usr = User::whereRaw("CONCAT(`name`, `firstName`) = ?", $name)->first();
        // $this->r = $chatRepository;
        $this->auth = $auth;
        $this->users = User::latest()->where('id','!=',auth()->user()->id)->get();
        $this->text = '';
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function chatWith($id)
    {
        $this->usr = User::findOrFail($id);
        Message::where('from',$id)->where('to',auth()->user()->id)->update(['read_at' => Carbon::now()]);
        $this->messages = Message::where(function($q) use($id){
            $q->where('from',auth()->user()->id);
            $q->where('to',$id);
        })->orWhere(function($q) use($id){
            $q->where('from',$id);
            $q->where('to',auth()->user()->id);
        })->with('user')->orderBy('created_at','DESC')->SimplePaginate(4);
        return $this->messages;
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
        if ($this->usr->id == $userId) {
            $this->chatWith($userId);
        }
    }

    public function render()
    {
        return view('livewire.chat-team',[
            'messages' => $this->chatWith($this->usr->id),
            // 'unread' => $this->r->unreadCount($this->auth->user()->id)
        ]);
    }
}
