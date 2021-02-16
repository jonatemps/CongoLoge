<div>

    <div>
        <div>
            <!-- Filter form section -->

        <div class="filter-search">
            <div class="container">
                <div class="section-title text-center mt-4 mb-1">
                    <h3 class="no-found">FILTREZ NOS MULTIPLES PROPRIETES.</h3>
                    <p>Parcourez nos proprietés à vendre ou à louer partout en RDC.</p>
                </div>
                <div class="row m-1" style="background: #63caa1">
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                          <label for=""></label>
                          <select class="form-control" wire:model="destination" name="destination">
                                <option selected>Toute destination</option>
                                <option value="VENTE">Vente</option>
                                <option value="LOCATION">Location</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                          <label for=""></label>
                          <select class="form-control" wire:model="cat" name="category">
                                <option>Toute categorie</option>
                                @foreach ($categories as $categoy)
                                    <option value="{{$categoy->slug}}">{{$categoy->name}}</option>
                                @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                          <label for=""></label>
                          <select class="form-control" wire:model="ville" name="ville">
                                <option>Toute ville</option>
                                @foreach ($villes as $vill)
                                    <option value="{{$vill->id}}">{{$vill->name}}</option>
                                @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                          <label for=""></label>
                          <select class="form-control" wire:model="commune" name="commune">
                                <option wire:click="search">Toute commune</option>
                                @if ($communes)
                                @foreach ($communes as $commun)
                                    <option wire:click="search" value="{{$commun->id}}">{{$commun->name}}</option>
                                @endforeach
                                @endif
                          </select>
                        </div>
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                       <div class="form-group">
                         <input type="text" class="form-control" wire:model="prixMin" name="prixMin" aria-describedby="helpId" placeholder="Prix Min ($)">
                       </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                          <input type="text" class="form-control" wire:model="prixMax" name="prixMax" aria-describedby="helpId" placeholder="Prix Max ($)">
                        </div>
                     </div>
                </div>


                {{--  --}}
            </div>
        </div>
        <!-- Filter form section end -->

        <!-- Breadcrumb -->
        <div class="site-breadcrumb p-3">
            <div class="container">
                <a href=""><i class="fa fa-home"></i>Acceuil</a>
                <span><i class="fa fa-angle-right"></i>Propriétés</span>
            </div>
        </div>

        <!-- page -->
        <section class="page-section categories-page pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-8 col-md-9">

                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="form-group">
                          <label class="mb-0" for="order">Ordre</label>
                          <select class="form-control" wire:model="order" name="order" id="order">
                                <option value="created_at">Par date Descendante</option>
                                <option value="price">Par prix Ascendant</option>
                          </select>
                        </div>
                    </div>
                </div>
                @if (!$biens->count())
                    <h2 class="no-found text-center">Pas de résultat pour votre combinaison! &#x1F630;</h2>
                @endif
                <div class="row">
                    @foreach ($biens as $bien)
                        @if ($bien->status == 'PUBLIE')
                            <div class="col-lg-4 col-md-6">
                                <!-- feature -->
                                <div class="feature-item">

                                    <div class="feature-pic set-bg" style="background-image: url('{{ Voyager::image($bien->image) }}');" data-setbg="{{ Voyager::image($bien->image) }}">
                                    <div class="{{$bien->destination == 'VENTE' ? 'sale-notic' : "rent-notic"}}">{{$bien->destination}}</div>
                                    <div wire:poll wire:click="$emit('like',({{$bien->id}}))" class="like btn btn-outline-danger float-right fa fa-star {{$bien->isLike() ? 'active' : ''}}"></div>
                                    </div>
                                    <div wire:click="show({{$bien->id}})" style="cursor: pointer" class="feature-text">
                                        <div class="text-center feature-title">
                                            <h5>{{$bien->title}}</h5>
                                            <p><i class="fa fa-map-marker"></i>{{-- {{substr($bien->adresse,0,23)}}... --}}&nbsp;{{$bien->commune->name}} / {{$bien->commune->ville->name}}</p>
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
                        @endif
                    @endforeach
                    <div class="col-lg-4 col-md-6">
                    </div>
                </div>
                <div class="pagination justify-content-center pagination-lg">
                    {{$biens->links()}}
                </div>
            </div>
        </section>
        <!-- page end -->
    </div>

    </div>

</div>
