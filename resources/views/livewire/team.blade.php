<div>
    <!-- Team section -->
<section class="team-section spad pb-0">
    <div class="container">
        <div class="section-title text-center">
            <h3>NOS AGENTS</h3>
            <p>Notre annuaire d'agents immobiliers qui peuvent vous aider.</p>
        </div>
        <div class="row">
            @if (session()->has('yourSel'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            {{-- {{dd($users)}} --}}
            @foreach ($users as $user)
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="member-pic">
                            <img src="{{ Voyager::image($user->avatar) }}" alt="#">
                            <div class="member-social">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-instagram"></i></a>
                                <a href="{{route('appChat',$user->name.$user->firstName)}}"><i class="fa fa-comments"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h5>
                                {{$user->name}}
                            </h5>
                            <span>Agent immobilier</span>
                            <div class="member-contact">
                                <p><i class="fa fa-phone"></i>+243 {{$user->phone}}</p>
                                <p><i class="fa fa-envelope"></i>{{$user->email}}</p>
                                <p><i class="fa fa-comments"aria-hidden="true"></i><a href="{{route('appChat',$user->name.$user->firstName)}}">&nbsp;Messages(s)</a>
                                    @if ($user->unread())
                                        <span class="badge badge-pill badge-danger text-white">
                                            {{$user->unread()}}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team section end-->
</div>
