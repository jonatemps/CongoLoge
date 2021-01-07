<div>
    <section class="page-top-section set-bg" style="background-image: url({{asset('img/page-top-bg.jpg')}})" data-setbg="img/page-top-bg.jpg">
        <div class="container text-white">
            <h2>Signalez votre Propriété ! &#x1F4E2;</h2>
        </div>
    </section>
    <!--  Page top end -->

    <!-- Breadcrumb -->
    <div class="site-breadcrumb p-2">
        <div class="container">
            <a href=""><i class="fa fa-home"></i>Accueil</a>
            <span><i class="fa fa-angle-right"></i>Signal</span>
        </div>
    </div>

    <!-- page -->
    <section class="page-section blog-page">
        <div class="container">
            @include('partials/flash-message')
            {{-- <div>
                @if (session()->has('succes'))
                    <div class="alert alert-success">
                        {{ session('succes') }}
                    </div>
                @endif
            </div> --}}
            <div class="row">
                <div class="im col-lg-6">
                    <img src="img/contact.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="contact-right">
                        <div class="section-title">
                            <h3 class="text-center">Vous ne perdez rien ! &#x1F607;</h3>
                            <p class="text-center">Laissez nous exposer votre Preopriété au grand public.</p>
                        </div>
                        <form class="contact-form" wire:submit.prevent="signal">
                            <div class="row">
                                <h5 class="col-md-12 text-center" style="{{Auth::check() ? 'display:none' : ''}}">Information sur le Propriétaire.</h5>
                                <div class="col-6 col-md-6 shadow p-3" style="{{Auth::check() ? 'display:none' : ''}}">
                                    <input type="text"  wire:model="nameProp" placeholder="Votre nom complet">
                                    @error('nameProp')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-2 col-6 col-md-6 shadow p-3" style="{{Auth::check() ? 'display:none' : ''}}">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text" style="height: 40px;">+243</div>
                                    </div>
                                    <input wire:model="phoneProp" type="text" style="height: 40px;" placeholder="Votre téléphone" class="form-control">
                                    @error('phoneProp')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 border-bottom border-success mb-5 shadow p-3" style="{{Auth::check() ? 'display:none' : ''}}">
                                    <input type="text" wire:model="adressProp" placeholder="Votre Adresse complet">
                                    @error('adressProp')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h5 class="col-md-12 text-center">Information sur la Propriété.</h5>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="category">Catégorie</label>
                                    <select wire:model="category" class="form-control" id="category">
                                        <option selected>Choissisez...</option>
                                        @foreach ($categories as $category)
                                            <option>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="destination">Destination</label>
                                    <select wire:model="destination" class="form-control" id="destination">
                                        <option selected>Choissisez...</option>
                                        <option >Vente</option>
                                        <option >Location</option>
                                    </select>
                                    @error('destination')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                  <div class="form-group col-12 col-md-12 shadow p-3">
                                    <label for="photo">Photo</label>
                                    <input wire:model="image" type="file" class="form-control-file" id="photo">
                                    @error('image')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="ville">Ville</label>
                                    <select wire:model="ville" class="form-control" id="ville" required>
                                        <option selected>Choissisez...</option>
                                        @foreach ($villes as $ville)
                                            <option>{{$ville->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('ville')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="commmune">Commune</label>
                                    <select wire:model="commune" class="form-control" id="commmune" required>
                                        <option selected>Choissisez...</option>
                                        @foreach ($communes as $commune)
                                            <option>{{$commune->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('commune')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="chambre">Chambre(s)</label>
                                    <select wire:model="chambre" class="form-control" id="chambre">
                                        <option selected>Choissisez...</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('chambre')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="cuisine">Cuisine(s)</label>
                                    <select wire:model="cuisine" class="form-control" id="cuisine">
                                        <option selected>Choissisez...</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('cuisine')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="baignoire">Salle(s) de bain</label>
                                    <select wire:model="baignoire" class="form-control" id="baignoire">
                                        <option selected>Choissisez...</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('baignoire')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="garage">Garage(s)</label>
                                    <select wire:model="garage" class="form-control" id="garage">
                                        <option selected>Choissisez...</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    @error('garage')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 shadow p-3">
                                    <label for="adress">Adresse</label>
                                    <input wire:model="adress" type="text" style="height: 40px;" id="adress" placeholder="ex: Q:Masano, AV:Tshopo 11">
                                    @error('adress')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-12 shadow p-3">
                                    <div class="input-group mb-2 col-md-12">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                          </div>
                                          <input wire:model="prix" type="text" style="height: 40px;" class="form-control" id="inlineFormInputGroup" placeholder="Prix">
                                    </div>
                                    @error('prix')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 shadow p-3 border-bottom border-success">
                                    <textarea wire:model.lazy="detail" style="height: 60px;"  placeholder="Autres détails"></textarea>
                                    @error('detail')
                                        <span class="text-danger err">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="site-btn shadow p-3 lft">Soumettre maintenant</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page end -->
</div>
