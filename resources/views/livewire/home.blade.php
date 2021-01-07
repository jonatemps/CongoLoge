<div>
    <div class="row">
        @foreach ($biens as $bien)
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
                                        <p><i class="fa fa-user"></i>{{$bien->authorId ? $bien->authorId->name : ''}}</p>
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
            @endforeach
    </div>
</div>
