<div class="col-8 col-md-8 col-xl-6 chat1 p-1">
    <div class="card">
        @if ($user)
            <div class="card-header msg_head">
                <div class="d-flex bd-highlight">
                    <div class="img_cont">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                        <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                        <span>{{$user->name ?? ''}}</span>
                        <p>{{$user->allMessages()}} Messages</p>
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
                @foreach ($messages as $message)
                    @if ($message->from == Auth::user()->id)
                        <div class="d-flex justify-content-end">
                            <div >
                                <h6 class="msg_author text-right pb-1">Moi</h6>
                                <div class="msg_cotainer_send">{!! nl2br(e($message->message))!!}</div>
                                <h6 class="msg_time_send">{{$message->formatDate()}}</h6>
                            </div>

                            <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-start">
                            <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div>
                                <h6 class="msg_author mb-1">{{$message->user->name}}</h6>
                                <div class="msg_cotainer">{!! nl2br(e($message->message)) !!}</div>
                                <h6 class="msg_time_send">{{$message->formatDate()}}</h6>
                            </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
        @if ($user)
            <div class="card-footer">
                <div class="input-group">
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
