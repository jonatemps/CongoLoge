
        <div>
        <section class="page-top-section set-bg" style="background-image: url({{asset('img/page-top-bg.jpg')}});" data-setbg="{{ asset('img/page-top-bg.jpg') }}">
            <div class="container text-white">
                <h2>VOS COUPS DE COEUR !&#x1F60D; </h2>
            </div>
        </section>
        <!-- Breadcrumb -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href=""><i class="fa fa-home"></i>Acceuil</a>
                <span><i class="fa fa-angle-right"></i>Favoris</span>
            </div>
        </div>

        <!-- page -->
        <section class="page-section categories-page pb-0">
            <div class="container">
                <div class="row">
                    @foreach ($biens as $bien)
                        @if ($bien->isLike())
                            <div class="col-lg-4 col-md-6">
                            <!-- feature -->
                            <div class="feature-item">

                                <div class="feature-pic set-bg" style="background-image: url('{{ Voyager::image($bien->image) }}');" data-setbg="{{ Voyager::image($bien->image) }}">
                                <div class="{{$bien->destination == 'VENTE' ? 'sale-notic' : "rent-notic"}}">{{$bien->destination}}</div>
                                <div wire:poll wire:click="$emit('like',({{$bien->id}}))" class="like btn btn-outline-danger float-right fa fa-star {{$bien->isLike() ? 'active' : ''}}"></div>
                                </div>
                                <div class="feature-text">
                                    <div class="text-center feature-title">
                                        <h5>{{$bien->title}}</h5>
                                        <p><i class="fa fa-map-marker"></i>{{substr($bien->adresse,0,23)}}.../ {{$bien->commune->name}}</p>
                                        @foreach ($bien->categories as $category)
                                            <span class="badge badge-pill badge-dark ml-2">{{$category->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="room-info-warp">
                                        <div class="room-info">
                                            <div class="rf-left">
                                                <p><i class="fa fa-th-large"></i>  {{$bien->cuisine}} Cuisine(s)</p>
                                                <p><i class="fa fa-bed"></i>  {{$bien->chambre}} Chambre(s)</p>
                                            </div>
                                            <div class="rf-right">
                                                <p><i class="fa fa-car"></i>  {{$bien->garage}} Garage(s)</p>
                                                <p><i class="fa fa-bath"></i>  {{$bien->baignoire}} Baignoire(s)</p>
                                            </div>
                                        </div>
                                        <div class="room-info">
                                            <div class="rf-left">
                                                <p><i class="fa fa-user"></i>{{$bien->authorId->name}}</p>
                                            </div>
                                            <div class="rf-right">
                                                <p><i class="fa fa-clock-o"></i> {{$bien->formatDate()}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('bien.show',$bien->slug)}}" class="room-price">{{$bien->getprice()}}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="col-lg-4 col-md-6">
                    </div>
                </div>
            </div>
        </section>
        <!-- page end -->
    </div>
