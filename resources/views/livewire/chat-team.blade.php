@section('style')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
@endsection
<div>
	<section class="page-top-section set-bg" style="background-image: url('img/page-top-bg.jpg');" data-setbg="{{ asset('img/page-top-bg.jpg') }}">
		<div class="container text-white">
			<h2>CHAT</h2>
		</div>
    </section>

    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-4 col-md-4 col-xl-3 chat1"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <div class="input-group">
                        <input type="text" placeholder="Search..." name="" class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                    @foreach ($users as $user)
                        <li class="{{$user->id == $usr->id ? 'active' : ''}}">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{ Voyager::image($user->avatar) }}" class="rounded-circle user_img">
                                    <span class="online_icon offline"></span>
                                </div>
                                <div class="user_info">
                                    <span wire:click='chatWith({{$user->id}})'>
                                        {{substr($user->name,0,15)}}
                                        @if ($user->unread())
                                            <span class="badge badge-pill badge-primary">
                                                {{$user->unread()}}
                                            </span>
                                        @endif
                                    </span>
                                    <p>Taherah left 7 mins ago</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            <div class="card-footer"></div>
            </div></div>

            <div class="col-8 col-md-8 col-xl-6 chat1">
                <div class="card">
                    @if ($usr)
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{ Voyager::image($user->avatar) }}" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>{{$usr->name ?? ''}}</span>

                                    <p>{{$usr->allMessages()}} Messages</p>
                                </div>
                                <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                    @endif
                    <div class="card-body msg_card_body">
                        @if ($messages)

                            @if ($messages->hasMorePages())
                                <div class="text-center">
                                    <a href="{{$messages->nextPageUrl()}}" class="btn btn-light">
                                        Voir les messages précédents
                                    </a>
                                </div>
                            @endif

                            @foreach (array_reverse($messages->items()) as $message)
                                @if ($message->from == Auth::user()->id)
                                    <div class="d-flex justify-content-end">
                                        <div >
                                            <div class="msg_cotainer_send">{{$message->message}}</div>
                                            <h6 class="msg_time_send">{{$message->formatDate()}}</h6>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-start">
                                        <div class="img_cont_msg">
                                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                        </div>
                                        <div>
                                            <div class="msg_cotainer">{{$message->message}}</div>
                                            <h6 class="msg_time_send">{{$message->formatDate()}}</h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            @if ($messages->previousPageUrl())
                                <div class="text-center">
                                    <a href="{{$messages->previousPageUrl()}}" class="btn btn-light">
                                        Voir les messages suivents
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                    @if ($user)
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea wire:model.lazy="text" class="form-control type_msg" name="text" placeholder="Tapez votre message..."></textarea>
                                <div class="input-group-append">
                                    <span wire:click='sendMessage({{$usr->id}})' class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    </div>
</div>


<script src="{{asset("js/echo.js")}}"></script>
@if (auth()->check())
<script>
    var authuser = @JSON(auth()->user())
</script>
@endif
<script>
Echo.private(`chat.${authuser.id}`)
.listen('Messagesend', function(e) {
    window.livewire.emit('messageReceved',e['from'])
});
</script>
