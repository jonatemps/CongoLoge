@extends('layouts.master')

@section('title',"Nos propriétées à vendre où à louer | Congologe")

@section('description',"Cherchez une propriété qui vous resseble en toute facilité.")

@section('content')
    <!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>NOS PROPRIÉTÉS. &#x1F60E;</h2>
		</div>
	</section>
	<!--  Page top end -->

    @livewire('biens-list')

    <!-- Team section -->
    @livewire('team')
    <!-- Team section end-->
@endsection
