@extends('layouts.app')

@section('content')
    <script src="{{ asset('ext/lottie.min.js') }}" defer></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="package" style="height: 300px"></div>
            </div>
            <div class="col-md-12 align-content-center">
                <h1 style="text-align: center;">{{ __('messages.checkout_success') }}</h1>
            </div>
            <hr>
            <div class="col-md-12 justify-content-center mb-5">
                <h3 style="text-align: center;">{!! __('messages.checkout_success_redirect')  !!}</h3>
            </div>
        </div>
    </div>
    <script>
        $('document').ready(function () {
            document.cookie =  'customer_id=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            lottie.loadAnimation({
                container: document.getElementById('package'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: '/done.json'
            });
            setInterval(function () {
                let secs = document.getElementById('seconds');
                let sec = +secs.innerText;
                sec = sec - 1;
                secs.innerText = sec.toString();
                if(sec < 0){
                    location.href = '/';
                }
            }, 1000)
        });
    </script>
@endsection
