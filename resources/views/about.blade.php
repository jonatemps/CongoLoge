@extends('layouts.master')

@section('title',"A propos de nous | Congologe")

@section('description',"Une brève description de ce que noous nous sommes.")

@section('content')
    <!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Apropos de nous</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>Apropos de nous</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<img class="mb-5" src="img/about.jpg" alt="">
			<div class="row about-text">
				<div class="col-xl-6 about-text-left">
                    <h5>Apropos de nous</h5>
                    <p>Nous sommes soucieux reduire votre energie depensée pour trouver une proprieté qui vous ressemble.</p>
					<p>Nous sommes parti d'une base; simplifier le contexte de la vente et de la location immobiliere en presentant une large annuaire des proprités d'après notre style de vie local.</p>
				</div>
				<div class="col-xl-6 about-text-right">
					<h5>NOS QUALITE</h5>
					<p>Donec enim ipsum porta justo integer at velna vitae auctor integer congue magna at risus auctor purus unt pretium ligula rutrum integer sapien ultrice ligula luctus undo magna risus</p>
					<ul class="about-list">
						<li><i class="fa fa-check-circle-o"></i>Lorem ipsum dolor sitdoni amet, consectetur dont adipis elite vivamus interdum.</li>
						<li><i class="fa fa-check-circle-o"></i>Integer pulvinar ante nulla, ac fermentum ex congue id vestibulum ensectetur. </li>
						<li><i class="fa fa-check-circle-o"></i>Proin blandit nibh in quam semper iaculis lorem ipsum dolor salama ender.</li>
						<li><i class="fa fa-check-circle-o"></i>Mauris at dolor imperdiet, aliquet nisi non, vulputate est sit amet.</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Review section -->
		<section class="review-section set-bg" data-setbg="img/review-bg.jpg">
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
						<p>“Leramiz was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
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
						<p>“Leramiz was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
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
						<p>“Leramiz was quick to understand my needs and steer me in the right direction. Their professionalism and warmth made the process of finding a suitable home a lot less stressful than it could have been. Thanks, agent Tony Holland.”</p>
						<h5>Stacy Mc Neeley</h5>
						<span>CEP’s Director</span>
						<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- Review section end-->


		<!-- Team section -->
		<section class="team-section spad pb-0">
			<div class="container">
				<div class="section-title text-center">
					<h3>Nos agents</h3>
					<p>Our directory of real estate agents who can help you</p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="img/team/1.jpg" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Tony Holland</h5>
								<span>Real Estate  Agent</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2288</p>
									<p><i class="fa fa-envelope"></i>tonyholland@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="img/team/2.jpg" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Sasha Gordon</h5>
								<span>Researcher</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2243</p>
									<p><i class="fa fa-envelope"></i>sashagordon@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="img/team/3.jpg" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Nicky Butt</h5>
								<span>Nicky Butt</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2255</p>
									<p><i class="fa fa-envelope"></i>nickybutt79@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="img/team/4.jpg" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Gina Wesley</h5>
								<span>Real Estate Agent</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2288</p>
									<p><i class="fa fa-envelope"></i>ginawesley@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Team section end-->
	</section>
	<!-- page end -->
@endsection
