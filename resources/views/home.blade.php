@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="application" class="container" style="opacity: 0.8;">
                <sports-app></sports-app>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
