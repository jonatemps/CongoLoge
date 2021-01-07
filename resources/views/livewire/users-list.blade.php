@section('style')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
@endsection
<div>
	<section class="page-top-section page-top-section-chat set-bg" style="background-image: url('img/page-top-bg.jpg');" data-setbg="{{ asset('img/page-top-bg.jpg') }}">
		<div class="container text-white">
			<h2>CHAT</h2>
		</div>
	</section>

    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-4 col-md-4 col-xl-3 chat1 p-1">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header">
                            <div class="input-group">

                            </div>
                        </div>
                        <div class="card-body contacts_body">
                            <ul class="contacts">
                            @foreach ($users as $user)
                                <li class="{{$user->id == $userSelectedId ? 'active' : ''}}">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img">
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span wire:click='selectUser({{$user->id}})'>
                                                {{substr($user->name,0,15)}}
                                                @if ($user->unread())
                                                    <span class="badge badge-pill badge-primary " style="font-size: 10px">
                                                        {{$user->unread()}}
                                                    </span>
                                                @endif
                                            </span>
                                            <p> En linge</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        @livewire('bavarder')
    </div>
</div>
