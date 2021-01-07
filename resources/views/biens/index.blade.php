@extends('layouts.master')

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
