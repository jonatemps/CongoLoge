@extends('layouts.master')

@section('content')


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white">
			<h2>TROUVEZ VOTRE PLACE AVEC NOTRE STYLE DE VIE LOCAL.</h2>
			<p>Recherchez des registres de propriétés immobilières; Bâtiment, Terrains et plus sur CongoLoge.com®.<br>Trouvez des informations sur des propriétés en RDC à partir des données sources les plus complètes.</p>
            <a href="{{route('biens.list')}}" class="site-btn">VOIR PLUS D'ANNONCES</a>
		</div>
	</section>
	<!-- Hero section end -->




	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>ANNONCES EN VEDETTE</h3>
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
				<h3>RECHERCHE DE PROPRIÉTÉ</h3>
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
	<section class="review-section set-bg mb-5" data-setbg="img/review-bg.jpg">
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
	</section>
	<!-- Review section end-->

    <!-- Services section -->
    <section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="img/service.jpg" alt="">
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 pl-lg-0">
                    <div class="section-title text-white">
                        <h3>NOS SERVICES</h3>
                        <p>Nous fournissons le service parfait pour </p>
                    </div>
                    <div class="services">
                        <div class="service-item">
                            <i class="fa fa-comments"></i>
                            <div class="service-text">
                                <h5>Service de consultant</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
                            </div>
                        </div>
                        <div class="service-item">
                            <i class="fa fa-home"></i>
                            <div class="service-text">
                                <h5>Gestion des propriétés</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
                            </div>
                        </div>
                        <div class="service-item">
                            <i class="fa fa-briefcase"></i>
                            <div class="service-text">
                                <h5>Location et vente</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section end -->

@livewire('team')

@endsection
