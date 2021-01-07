<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Events\Messagesend;
use App\Events\PostCreatEvent;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $users = User::where('role_id',1)->get();
            // dd($users);
            $biens = Bien::where('En_vedette',1)->orderBy('created_at','DESC')->take(6)->get();
            return view('home',[
                'users' => $users,
                'biens' => $biens
            ]);

        }

        public function startEvent(){
            $event = new PostCreatEvent();

            event($event);

            dd();
        }


}
