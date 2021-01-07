@extends('layouts.master')

@section('content')

 <!-- Page top section -->
 <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
    <div class="container text-white">
        <h2>Creer un compte</h2>
        <p>Offrez-vous un compte et profitez de multiples foctionnalités reservées aux utilisateurs authentifiés ! &#x1F92D;</p>
    </div>
</section>
<!--  Page top end -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
