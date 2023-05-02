@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/owl.theme.default.min.css') }}">
    <script src="{{ asset('dist/owl.carousel.min.js') }}" defer></script>
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('gallery') }}">{{ __('messages.gallery') }}</a></li>
            </ol>
        </nav>
    </div>

    <div class="gallery-inside-bloc container">
        <div class="gallery-inside-title">{{ $gallery->name }}</div>
        <div class="gallery-inside-subtitle">{!! $gallery->description !!}</div>
        <div class="bloc-left ">
            <div class="column-1">
                <img id="alp-1" src="{{ Voyager::image( $gallery->photo ) }}" alt="{{ $gallery->name }}"/>
            </div>
        </div>
    </div>

    <div class="column-2 d-flex justify-content-center align-items-start">
        <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
            <div class="carousel-inner">

                <div>
                    <div class="center d-flex justify-content-center">

                        <div class="cola">
                            <img src="{{ Voyager::image( $gallery->photo ) }}" alt="{{ $gallery->name }}"/>
                        </div>
                        @php
                            $photos = json_decode($gallery->photos);
                        @endphp
                        @foreach($photos as $photo)
                            <div class="cola">
                                <a href="{{ Voyager::image( $photo ) }}" data-fancybox="images" data-caption="{{ $gallery->name }}">
                                    <img src="{{ Voyager::image( $photo ) }}" alt="{{ $gallery->name }}"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{--<a class="carousel-control-prev circle-2" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next circle-2" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
            <span class="sr-only">Next</span>
        </a>--}}
    </div>
    <script>
        
        $(document).ready(function(){
            $('.center').slick({
                dots: true,
                centerMode: true,
                autoplay: true,
                centerPadding: '0',
                slidesToShow: 3,
                responsive: [
                    {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 3
                    }
                    },
                    {
                    breakpoint: 900,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 2
                    }
                    },
                    {
                    breakpoint: 700,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                    },
                ]
            });
            $("#shots").owlCarousel({
                items: 4,
                loop: true,
                freeDrag: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                animateIn: true,
                nav: true,
                navText: ['<a class="carousel-control-prev circle-2" href="#carouselExampleControls" role="button" data-slide="prev">\n' +
                '            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>\n' +
                '            <span class="sr-only">Previous</span>\n' +
                '        </a>', '<a class="carousel-control-next circle-2" href="#carouselExampleControls" role="button" data-slide="next">\n' +
                '            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>\n' +
                '            <span class="sr-only">Next</span>\n' +
                '        </a>'],
                responsive: {
                    0:{
                        center: true,
                        items:1
                    },
                    600:{
                        center: true,
                        items:2
                    },
                    850:{
                        center: true,
                        items:3
                    },
                    1200:{
                        items:4,
                    }
                }
            });
        });
    </script>
@endsection
