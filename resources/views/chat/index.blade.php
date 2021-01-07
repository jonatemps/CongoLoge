@extends('layouts.master')

@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
    <div class="container text-white">
        <h2>Chat</h2>
    </div>
</section>
<!--  Page top end -->
    <div>
        <div class="container-chat clearfix">
            @livewire('chat')
            @livewire('conversation')
        </div> <!-- end container -->
    </div>
@endsection

<script>
</script>
