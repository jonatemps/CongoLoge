@extends('layouts.master')

@section('title',"Page d'acceuil | Congologe")

@section('description',"Nous vous proposons les biens à louer ou à vendre en RDC.")

@section('content')


	<!-- Hero section -->
	<section class="hero-section set-bg homeSection" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white homeImg">
			<h2 class="font-weight-bold">TROUVEZ VOTRE PLACE AVEC NOTRE STYLE DE VIE LOCAL.</h2>
			<p>Recherchez des registres de propriétés immobilières; Bâtiment, Terrains et plus sur <span class="font-weight-bold">CongoLoge.com®</span> .<br>Trouvez des informations sur des propriétés en RDC à partir des données sources les plus complètes.</p>
            {{-- <a href="{{route('biens.list')}}" class="site-btn">VOIR PLUS D'ANNONCES</a> --}}
		</div>
	</section>
	<!-- Hero section end -->

    <section class="feature-section spad">
        <div class="container">
            <div class="row justify-content-center mb-3 mt-5">
                <div class="col-md-6">
                    <blockquote class="blockquote">
                        <p class="h5 mb-0 font-weight-bold font-italic">Les congolais sont sensés résoudre les vrais problèmes qui les concernent...</p>
                        <footer class="blockquote-footer">Professeur<cite title="UNIKIN"> MUHINDO ,université de Kinshasa</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 text-center">
                    <img src="img/uli/prop.png" alt="..." class="img-fluid col-5">
                    <h3 class="font-weight-bold">êtes-vous propriétaire ?</h3>
                    <p class="lead">
                        Faites un clic sur <a class="font-weight-bold" href="{{ route('biens.addForm')}}">Signaler</a> pour nous informer sur la disponibilité de votre propriété afin que nous l'affichons partout en RDC.
                    </p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="img/cherche.jpg" alt="..." class="img-fluid col-5">
                    <h3 class="font-weight-bold">êtes-vous locataire ?</h3>
                    <p class="lead">
                        Pas la pein de perdre du temps allez directement voir <a class="font-weight-bold" href="{{route('biens.list')}}">notre registre de proprités</a> immobilières aux données sources complètes mise en location.
                    </p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="img/uli/vente.png" alt="..." class="img-fluid col-5">
                    <h3 class="font-weight-bold">êtes-vous vendeur ?</h3>
                    <p class="lead">
                        Appuyez sur <a class="font-weight-bold" href="{{ route('biens.addForm')}}">Signaler</a> pour nous informer sur la disponibilité de votre propriété afin que nous l'affichons partout en RDC.
                    </p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="img/achat.jpg" alt="..." class="img-fluid col-5">
                    <h3 class="font-weight-bold">êtes-vous acheteur ?</h3>
                    <p class="lead">
                        Ne tardez donc pas, allez directement voir <a class="font-weight-bold" href="{{route('biens.list')}}">notre registre de proprités</a> immobilières aux données sources complètes mise en vente.
                    </p>
                </div>
            </div>
        </div>
    </section>

        <!-- Services section -->
        <section class="services-section spad set-bg" {{-- data-setbg="img/service-bg.jpg" --}}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="img/service.jpg" alt="">
                    </div>
                    <div class="col-12 col-lg-5 offset-lg-1 pl-lg-0">
                        <div class="section-title">
                            <h3 class="font-weight-bold">NOS SERVICES</h3>
                            <p>Nous fournissons le service parfait pour </p>
                        </div>
                        <div class="services">
                            <div class="service-item">
                                <i class="fa fa-comments"></i>
                                <div class="service-text">
                                    <h5 class="font-weight-bold">Service de consultant</h5>
                                    <p>Soyez en contacte avec nos agents pour toutes vos préocupations, cela en permanence et en temps réel.</p>
                                </div>
                            </div>
                            <div class="service-item">
                                <i class="fa fa-home"></i>
                                <div class="service-text">
                                    <h5 class="font-weight-bold">Gestion de propriétés</h5>
                                    <p>Votre propriété entre des bonnes mains pour une gestion efficace.</p>
                                </div>
                            </div>
                            <div class="service-item">
                                <i class="fa fa-briefcase"></i>
                                <div class="service-text">
                                    <h5 class="font-weight-bold">Location et vente</h5>
                                    <p>Laissez nous assumer le marketing de votre propriété, que ce soit pour sa vente ou pour sa location.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section end -->

	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3 class="font-weight-bold">ANNONCES EN VEDETTE</h3>
				<p>Parcourir les maisons et appartements à vendre et à louer dans votre région.</p>
			</div>
			@livewire('home')
            <div class="text-center">
                <a href="{{route('biens.list')}}" class="site-btn" style="background-color: rgb(248, 64, 18)">VOIR PLUS D'ANNONCES</a>
            </div>
		</div>
	</section>
	<!-- feature section end -->



	<!-- feature category section -->
	<section class="feature-category-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3 class="font-weight-bold">RECHERCHE DE PROPRIÉTÉ</h3>
				<p>Quel type de propriété recherchez-vous? Nous allons vous aider.</p>
			</div>
			<div class="row">
				<div class="col-6 col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/1.jpg" alt="">
					<h5>Appartement à louer ou à vendre</h5>
				</div>
				<div class="col-6 col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/2.jpg" alt="">
					<h5>Maison à louer ou à vendre</h5>
				</div>
				<div class="col-6 col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/3.jpg" alt="">
					<h5>Villas à louer ou à vendre</h5>
				</div>
				<div class="col-6 col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/4.jpg" alt="">
					<h5>Bâtiment bureau à louer ou à vendre</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- feature category section end-->


	<!-- Review section -->
	{{-- <section class="review-section set-bg mb-5" data-setbg="img/review-bg.jpg">
		<div class="container">
			<div class="review-slider owl-carousel">
				<div class="review-item text-white">
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<p>Congologe a rapidement compris mes besoins et m'a orienté dans la bonne direction. Leur professionnalisme et leur chaleur ont rendu le processus de trouver une maison convenable beaucoup moins stressant qu'il aurait pu l'être. Merci, agent Jonathan Mupene.”</p>
					<h5>Stacy Mc Neeley</h5>
					<span>CEP’s Director</span>
					<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
				</div>
				<div class="review-item text-white">
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<p>“Congologe a rapidement compris mes besoins et m'a orienté dans la bonne direction. Leur professionnalisme et leur chaleur ont rendu le processus de trouver une maison convenable beaucoup moins stressant qu'il aurait pu l'être. Merci, agent Jonathan Mupene.”</p>
					<h5>Stacy Mc Neeley</h5>
					<span>CEP’s Director</span>
					<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
				</div>
				<div class="review-item text-white">
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<p>“Congologe a rapidement compris mes besoins et m'a orienté dans la bonne direction. Leur professionnalisme et leur chaleur ont rendu le processus de trouver une maison convenable beaucoup moins stressant qu'il aurait pu l'être. Merci, agent Jonathan Mupene.”</p>
					<h5>Stacy Mc Neeley</h5>
					<span>CEP’s Director</span>
					<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- Review section end-->

{{-- @livewire('team') --}}

@endsection
