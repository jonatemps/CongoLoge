<?php

namespace App\Repository;

use App\Message;
use App\User;
use Carbon\Carbon;

class ChatRepository
{
    private $user;
    private $message;


    public function __construct(Message $message)
    {
        // $this->user = $user;
        $this->message = $message;
    }


    public function unreadCount(int $userId)
    {
        return $this->message->newQuery()
                    ->where('to_id',$userId)
                    ->groupBy('from')
                    ->selectRaw('from,COUNT(id) as count')
                    ->whereRaw('read_at IS NULL')
                    ->get()
                    ->pluck('count','from_id');
    }

    public function readAllFrom(int $from,int $to)
    {
        $this->message->where('from',$from)->where('to',$to)->update(['read_at' => Carbon::now()]);
    }
}
