<div class="col-md-8 col-xl-6 chat">
    <div class="card">
        @if ($user)
            <div class="card-header msg_head">
                <div class="d-flex bd-highlight">
                    <div class="img_cont">
                        <img src="{{ Voyager::image($user->avatar) }}" class="rounded-circle user_img">
                        <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                        <span>{{$user->name ?? ''}}({{$user->unread()}})</span>
                        <p>1767 Messages</p>
                    </div>
                    <div class="video_cam">
                        <span><i class="fas fa-video"></i></span>
                        <span><i class="fas fa-phone"></i></span>
                    </div>
                </div>
                <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                {{-- <div class="action_menu">
                    <ul>
                        <li><i class="fas fa-user-circle"></i> View profile</li>
                        <li><i class="fas fa-users"></i> Add to close friends</li>
                        <li><i class="fas fa-plus"></i> Add to group</li>
                        <li><i class="fas fa-ban"></i> Block</li>
                    </ul>
                </div> --}}
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

                @foreach ($messages as $message)
                    @if ($message->from == Auth::user()->id)
                        <div class="d-flex justify-content-end mb-4">
                            <div >
                                <div class="msg_cotainer_send">{{$message->message}}</div>
                                <h6 class="msg_time_send">8:55 AM, Today</h6>
                            </div>

                            <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div>
                                <div class="msg_cotainer">{{$message->message}}</div>
                                <h6 class="msg_time_send">8:55 AM, Today</h6>
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
                    <textarea class="form-control type_msg" wire:model.lazy="text" placeholder="Tapez votre message..."></textarea>
                    <div class="input-group-append">
                        <span wire:click='sendMessage({{$user->id ?? ''}})' class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                    </div>
                </div>
            </div>
        @endif
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
