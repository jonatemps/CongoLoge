@extends('layouts.master')

@section('title',"Créer un compte | Congologe")

@section('description',"S'enregistrer pour profiter des miltiples foctionalité au site.")

@section('style')
    <link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
    <!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
            <h2>Creer un compte</h2>
            <H4>Offrez-vous un compte et profitez de multiples foctionnalités reservées aux utilisateurs authentifiés ! &#x1F60E;</H4>
		</div>
	</section>
    <!--  Page top end -->

    <div class="bg-gra-02 p-t-10 p-b-10 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title text-center">Formulaire d'enregistrement</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label" for="firstName">Prénom</label>
                                    <input class="input--style-4 @error('firstName') is-invalid @enderror" id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label" for="name">Nom</label>
                                    <input class="input--style-4 @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label" for="phone">Téléphone</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" id="phone" placeholder="ex: 813134572" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label" for="genre">Genre</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Homme
                                            <input type="radio" checked="checked" id="sexe" value="M" name="sexe">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Femme
                                            <input type="radio" id="sexe" value="F" name="sexe">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label for="email" class="label">Email</label>
                                    <input class="input--style-4" placeholder="ex: mupene7@gmail.com" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label for="password" class="label">Mot de passe</label>
                                    <input id="password" class="input--style-4 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label for="password-confirm" class="label">Confirmer le mote de passe</label>
                                    <input id="password-confirm" type="password" class="input--style-4"  name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn-primary offset-3 offset-md-4 font-weight-bold" type="submit">Creer votre compte</button>
                        </div>

                        <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OU</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="{{ url('auth/google') }}" class="btn btn-light border btn-block py-2 text-danger">
                            <i class="fa fa-google mr-2"></i>
                            <span class="font-weight-bold ">Continue avec Google</span>
                        </a>
                        <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-block py-2">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continue avec Facebook</span>
                        </a>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Déjà inscrit? <a href="{{ route('login') }}" class="text-primary ml-2">Connexion</a></p>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
