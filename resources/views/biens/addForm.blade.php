@extends('layouts.master')

@section('title')
    Signalez une proprité immobilière
@endsection
    De partout où vous vous trouvez, dites à Congologe que vous souhaiter qu'il publie votre proprieté.
@section('description')

@endsection

@section('content')
    <section class="page-top-section set-bg" style="background-image: url({{asset('img/page-top-bg.jpg')}})" data-setbg="img/page-top-bg.jpg">
        <div class="container text-white">
            <h2>Signalez votre Propriété !</h2>
        </div>
    </section>
    <!--  Page top end -->

    <!-- Breadcrumb -->
    <div class="site-breadcrumb p-2">
        <div class="container">
            <a href=""><i class="fa fa-home"></i>Home</a>
            <span><i class="fa fa-angle-right"></i>Blog Grid</span>
        </div>
    </div>

    <!-- page -->
    <section class="page-section blog-page">
        <div class="container">
            <div class="row">
                <div class="im col-lg-6">
                    <img src="img/contact.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="contact-right">
                        <div class="section-title">
                            <h3 class="text-center">Vous ne perdez rien !</h3>
                            <p class="text-center">Laissez nous exposer votre Preopriété au grand public.</p>
                        </div>
                        <form class="contact-form">
                            <div class="row">
                                <h5 class="col-md-12 text-center">Information sur le Propriétaire.</h5>
                                <div class="col-6 col-md-6 shadow p-3">
                                    <input type="text" placeholder="Votre nom complet">
                                </div>
                                <div class="col-6 col-md-6 shadow p-3">
                                    <input type="text" placeholder="Votre téléphone">
                                </div>
                                <div class="col-md-12 border-bottom border-success mb-5 shadow p-3">
                                    <input type="text" placeholder="Votre Adresse complet">
                                </div>
                                <h5 class="col-md-12 text-center">Information sur la Propriété.</h5>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="category">Catégorie</label>
                                    <select class="form-control" id="category">
                                        @foreach ($categories as $category)
                                            <option>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control-file" id="photo">
                                  </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="ville">Ville</label>
                                    <select class="form-control" id="ville">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="commune">Commune</label>
                                    <select class="form-control" id="commune">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="chambre">Chambre(s)</label>
                                    <select class="form-control" id="chambre">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="cuisine">Cuisine(s)</label>
                                    <select class="form-control" id="cuisine">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="baignoire">Salle(s) de bain</label>
                                    <select class="form-control" id="baignoire">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-md-6 shadow p-3">
                                    <label for="garage">Garage(s)</label>
                                    <select class="form-control" id="garage">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-md-12 shadow p-3">
                                    <input type="text" style="height: 40px;" placeholder="Adresse (ex: Q:Masano, AV:Tshopo 11)">
                                </div>
                                <div class="input-group mb-2 col-md-12 shadow p-3">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" style="height: 40px;" class="form-control" id="inlineFormInputGroup" placeholder="Prix">
                                </div>
                                <div class="col-md-12 shadow p-3 border-bottom border-success">
                                    <textarea style="height: 60px;"  placeholder="Autres détails"></textarea>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button class="site-btn shadow p-3 lft">Soumettre maintenant</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page end -->
@endsection
