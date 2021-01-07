@extends('layouts.master')

@section('content')
    <!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('img/page-top-bg.jpg') }}">
		<div class="container text-white">
			<h2>LISTE UNIQUE</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Single Listing</span>
		</div>
	</div>

	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
                        <div class="sl-item set-bg" data-setbg="{{ Voyager::image($bien->image) }}">
							<div class="{{$bien->destination == 'VENTE' ? 'sale-notic' : "rent-notic"}}">{{$bien->destination}}</div>
						</div>
                        @if ($bien->images)
                            @foreach (json_decode($bien->images) as $image)
                                <div class="sl-item set-bg" data-setbg="{{ Voyager::image($image) }}">
                                    <div class="{{$bien->destination == 'VENTE' ? 'sale-notic' : "rent-notic"}}">{{$bien->destination}}</div>
                                </div>
                            @endforeach
                        @endif
					</div>
					<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                        <div class="sl-thumb set-bg" data-setbg="{{ Voyager::image($bien->image) }}"></div>
                        @if ($bien->images)
                            @foreach (json_decode($bien->images) as $image)
                                <div class="sl-thumb set-bg" data-setbg="{{ Voyager::image($image) }}"></div>
                            @endforeach
                        @endif
					</div>
					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2>{{$bien->title}}</h2>
								<p><i class="fa fa-map-marker"></i>{{$bien->adresse}}</p>
							</div>
							<div class="col-xl-4">
								<a href="#" class="price-btn">{{$bien->getprice()}}</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Détails de la propriété</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6 col-6">
								<p><i class="fa fa-th-large"></i> {{$bien->cuisine}} Cuisine(s)</p>
								<p><i class="fa fa-bed"></i> {{$bien->chambre}}  Chambre(s)</p>
                                <p><i class="fa fa-bath"></i>{{$bien->baignoire}} Baignoire(s)</p>
							</div>
							<div class="col-md-4 col-sm-6 col-6">
								<p><i class="fa fa-car"></i> {{$bien->garage}} Garage(s)</p>
								<p><i class="fa fa-building-o"></i> Family Villa</p>
								<p><i class="fa fa-clock-o"></i> {{$bien->formatDate()}}</p>
							</div>
							<div class="col-md-4 col-6">
                                <p><i class="fa fa-user"></i>{{$bien->authorId->name}}</p>
							</div>
						</div>
						<h3 class="sl-sp-title">La description</h3>
						<div class="description">
							<p>{!!$bien->description!!}</p>
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="{{ asset('storage/'.$bien->authorId->avatar) }}"></div>
						<div class="author-info">
							<h5>{{$bien->authorId->name}}</h5>
							<p>Agent de l'Agence</p>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i>{{$bien->authorId->phone}}</p>
							<p><i class="fa fa-envelope"></i>{{$bien->authorId->email}}</p>
                            <p><i class="fa fa-comments"aria-hidden="true"></i><a href="{{route('chat',$bien->authorId->name.$bien->authorId->firstName)}}">&nbsp;Messages(s)</a>
                                @if ($bien->authorId->unread())
                                    <span class="badge badge-pill badge-danger text-white">
                                        {{$bien->authorId->unread()}}
                                    </span>
                                @endif
                            </p>
                        </div>
					</div>
					<div class="related-properties">
						<h2>Propriété connexe</h2>
                        @foreach ($biens as $bien)
                            <div class="rp-item">
                                <div class="rp-pic set-bg" data-setbg="{{ Voyager::image($bien->image) }}">
                                    <div class="{{$bien->destination == 'VENTE' ? 'sale-notic' : "rent-notic"}}">{{$bien->destination}}</div>
                                </div>
                                <div class="rp-info">
                                    <h5>{{$bien->title}}</h5>
                                    <p><i class="fa fa-map-marker"></i>{{$bien->adresse}}</p>
                                </div>
                                <a href="{{route('bien.show',$bien->slug)}}" class="rp-price">{{$bien->price}} $</a>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->
@endsection

@section('js')
    	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="{{ asset('js/map-2.js') }}"></script>
@endsection
