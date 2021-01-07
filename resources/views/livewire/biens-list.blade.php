<div>

    <div>
        <div>
            <!-- Filter form section -->

        <div class="filter-search">
            <div class="container">
                <div class="section-title text-center mt-4 mb-1">
                    <h3 class="no-found">FILTREZ NOS MULTIPLES ANNONCES.</h3>
                    <p>Parcourir les maisons et appartements à vendre et à louer dans votre région:</p>
                </div>
                <div class="row">
                    <div class=" col-lg-12 col-md-12">
                        <form class="filter-form ">
                            <select class="col-5" wire:model="cat" name="category">
                                <option wire:click='search' value="Tout categorie">Tout categorie</option>
                                @foreach ($categories as $category)
                                    <option wire:click='search' value="{{$category->slug}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            {{-- {{$cat}} --}}
                            <select class="col-5" wire:model="ville" name="ville">
                                <option>Toute ville</option>
                                @foreach ($villes as $vill)
                                    <option value="{{$vill->id}}">{{$vill->name}}</option>
                                @endforeach
                            </select>
                            {{-- {{$ville}} --}}
                            <select class="col-5" wire:model="commune" name="commune">
                                <option wire:click="search">Toute commune</option>
                                @if ($communes)
                                @foreach ($communes as $commun)
                                    <option wire:click="search" value="{{$commun->id}}">{{$commun->name}}</option>
                                @endforeach
                                @endif

                            </select>
                            {{-- {{$commune}} --}}
                            <select class="col-5" wire:model="price" name="prix">
                                <option wire:click="search" value="Tout prix" >Tout prix</option>
                                <option wire:click="search" value="50">10 $ à 50 $</option>
                                <option wire:click="search" value="100">50 $ à 100 $</option>
                                <option wire:click="search" value="150">100 $ à 150 $</option>
                                <option wire:click="search" value="200">150 $ à 200 $</option>
                                <option wire:click="search" value="250">200 $ à 250 $</option>
                                <option wire:click="search" value="300">250 $ à 300 $</option>
                                <option wire:click="search" value="301">plus de 300 $</option>

                            </select>
                            {{-- {{$price}} --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter form section end -->

        <!-- Breadcrumb -->
        <div class="site-breadcrumb">
            <div class="container">
                <a href=""><i class="fa fa-home"></i>Acceuil</a>
                <span><i class="fa fa-angle-right"></i>Propriétés</span>
            </div>
        </div>

        <!-- page -->
        <section class="page-section categories-page pb-0">
            <div class="container">
                @if (!$biens->count())
                    <h2 class="no-found text-center">Pas de résultat pour votre combinaison! &#x1F630;</h2>
                @endif
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
