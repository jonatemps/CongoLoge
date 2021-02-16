@extends('layouts.master')

@section('title',"Connexion | Congologe")

@section('description',"Se connecter pour profiter des miltiples foctionalité au site.")

@section('style')
    <link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
    <!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
            <h2>Connexion</h2>
            <h4>Connectez-vous et profitez de multiples foctionnalités reservées aux utilisateurs authentifiés ! &#x1F60E;</h4><br>
            <p>( Chat,Favori,Notification...)</p>
		</div>
	</section>
    <!--  Page top end -->

    <div class="bg-gra-02 p-t-10 p-b-10 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title text-center">Connection</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label for="email" class="label">Email</label>
                                    <input class="input--style-4 @error('email') is-invalid @enderror" placeholder="ex: mupene7@gmail.com" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <input id="password" class="input--style-4 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connexion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
