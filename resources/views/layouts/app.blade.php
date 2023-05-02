<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site.title')  }}</title>
    <meta name="description" content="{{ setting('site.description') }}">
    <link rel="icon" type="image/png" href="/img/favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('dist/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}" defer></script>

    <!-- Styles -->
    <link defer href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link as href="{{ asset('css/main.css?v=1a040064279b') }}" rel="stylesheet">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <link rel="stylesheet" href="{{ asset("css/newStyles.css") }}" rel="stylesheet">
    <script>
        let config = {
            colors: [],
            sizes: [],
            color: false,
            size: false
        };
    </script>
    {{-- @if ($languageIso === 'en')
    <style>anglereni hamar font size tur</style>
    @elseif($languageIso === 'hy')
    <style>hayereni hamar font size tur</style>
    @elseif($languageIso === 'ru')
    <style>rusereni hamar font size tur</style>
    @endif --}}
</head>
<body>
<header>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
    <div class="header-top ">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header-menu d-flex justify-content-between align-items-center">
                <div class="list" id="about_company"><a href="{{ route('about_us') }}">{{ __('messages.about_company') }}</a></div>
                <div class="list" id="news"><a href="{{ route('news') }}">{{ __('messages.news') }}</a></div>
                <div class="list" id="payment"><a href="{{ route('payments') }}">{{ __('messages.payment') }}</a></div>
                <div class="list" id="partners"><a href="{{ route('partners') }}">{{ __('messages.partners') }}</a></div>
                <div class="list" id="gallery"><a href="{{ route('gallery') }}">{{ __('messages.gallery') }}</a></div>
                <div class="list" id="contacts"><a href="{{ route('home') }}#contacts_section">{{ __('messages.contacts') }}</a></div>
            </div>
            <div class="header-languages d-flex justify-content-between align-items-center static-switcher">
                @if ($languageIso === 'en')
                    <div class="languages activ" id="eng">Eng</div>
                @else
                        <a href="{{ route('language', 'en') }}" class="languages " id="eng">Eng</a>
                @endif
                    @if ($languageIso === 'ru')
                        <div class="languages activ" id="rus">Рус</div>
                    @else
                        <a href="{{ route('language', 'ru') }}" class="languages" id="rus">Рус</a>
                    @endif
                    @if ($languageIso === 'hy')
                        <div class="languages activ" id="arm">Հայ</div>
                    @else
                        <a href="{{ route('language', 'hy') }}" class="languages" id="arm">Հայ</a>
                    @endif
            </div>
        </div>
    </div>
    <div class="header-center fixed d-flex justify-content-between align-items-center " id="block_1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="logo">
            <a href="/">
                <img src="{{ setting('site.logo') ?: '/img/logo-header.svg' }}" alt="{{ setting('site.title')  }}">
            </a>
        </div>
        <div class="tel_basket d-flex justify-content-between align-items-center">
            <div class="search">
                <button type="button" class="search-background" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{ asset('images/search-icon.png') }}" class="search-icon"> 
                </button>
            </div>
            <div class="basket">
                <div class="basket-info">
                    <a href="{{ route('basket') }}" class="d-flex justify-content-center align-items-center">
                        <span class="basket-icon"><img src="/img/basket.png" height="21" width="25" alt="basket"/></span>
                        <span class="basketBox--first--title">{{ __('messages.in_basket') }}</span>
                        <span class="basketBox--count--number" id="pc-basket">{{ $basketCount }}</span>
                        <span class="basketBox--last--title"> <span>{{ __('messages.basket_products') }}</span>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-languages justify-content-between align-items-center mob-switcher">
            @if ($languageIso === 'en')
                <div class="languages activ" id="eng">Eng</div>
            @else
                    <a href="{{ route('language', 'en') }}" class="languages " id="eng">Eng</a>
            @endif
                @if ($languageIso === 'ru')
                    <div class="languages activ" id="rus">Рус</div>
                @else
                    <a href="{{ route('language', 'ru') }}" class="languages" id="rus">Рус</a>
                @endif
                @if ($languageIso === 'hy')
                    <div class="languages activ" id="arm">Հայ</div>
                @else
                    <a href="{{ route('language', 'hy') }}" class="languages" id="arm">Հայ</a>
                @endif
        </div>
    </div>
    <div class="header-bottom container-fluid fixed-menu" id="block_2">
        <div class="header-menu-2 container d-flex justify-content-between align-items-center">
            @foreach ($categories as $category)
            <div class="item">
                <a href="{{ route('category', [$category->id, 0 ]) }}">{{ $category->name }}</a>
                <span class="toggle-icon-block">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                </span>
                @if (count($category->subcategories))
                    <div class="hover-bloc justify-content-around align-items-start">
                        @foreach($category->subcategories as $sub)
                        <div class="col-hov d-flex flex-column align-items-center">
                                <div class="icons ">
                                    <img data-lazysrc="{{ Voyager::image($sub->icon) }}"/>
                                </div>
                            <div class="icons-title"><a href="{{ route('category', [$category->id, $sub->id]) }}">{{ $sub->name }}</a></div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</header>
<div id="fixed">@yield('content')</div>
<div class="basket-mob d-flex justify-content-center align-items-center">
    <a href="{{ route('basket') }}" class="d-flex justify-content-center align-items-center bas-mob">
        <span class="basket-icon"><img src="/img/basket.png" height="21" width="25" alt="basket"></span>
        <span class="basketBox--count--number" id="mobile-basket">{{ $basketCount }}</span>
    </a>
</div>
<footer class="footer-section">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="footer-left">
            <div class="footer-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ setting('site.logo') ?: '/img/logo-footer.svg' }}" alt="{{ setting('site.title')  }}">
                </a>
            </div>
        </div>
        <div class="footer-center">
            <div class="footer-menu">
                <div class="list"><a href="{{ route('about_us') }}">{{ __('messages.about_company') }}</a></div>
                <div class="list"><a href="{{ route('news') }}">{{ __('messages.news') }}</a></div>
                <div class="list"><a href="{{ route('payments') }}">{{ __('messages.payment') }}</a></div>
                <div class="list"><a href="{{ route('partners') }}">{{ __('messages.partners') }}</a></div>
                <div class="list"><a href="{{ route('gallery') }}">{{ __('messages.gallery') }}</a></div>
                <div class="list"><a href="{{ route('home') }}#contacts_section">{{ __('messages.contacts') }}</a></div>

            </div>
        </div>
        <div class="footer-right d-flex justify-content-between align-items-center">
            <div class="social-icon fa"><a href="http://facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <div class="social-icon inst"><a href="http://instagram.com"><i class="fa fa-instagram"
                                                                            aria-hidden="true"></i></a></div>
            <div class="social-icon what"><a href="http://whatsapp.com"><i class="fa fa-whatsapp"
                                                                           aria-hidden="true"></i></a></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="{{ asset('images/search-icon.png') }}" width="20"></span>
            </div>
            <input type="text" class="form-control search-input" placeholder="{{ __('modal.search_placeholder') }}" >
            </div>
            <ul class="navbar-nav mr-auto search-result">
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary show-more-button">{{ __('modal.show_more') }}</button>
        </div>
        </div>
    </div>
    </div>
</footer>
<script>
    $(window).scroll(function() {
        if($(this).scrollTop() >= 25 || window.innerWidth <= 990){
            $( ".fixed" ).css( "top", "0" );
            $( ".fixed-menu" ).css( "top", "0" );
            $( ".fixed" ).css( "transition", "top 0.1s linear" );
            $( ".fixed-menu" ).css( "transition", "top 0.1s linear" );
        }else{
            $( ".fixed" ).css( "top", "50px" );
            $( ".fixed-menu" ).css( "top", "50px" );
            $( ".fixed" ).css( "transition", "top 0.1s linear" );
            $( ".fixed-menu" ).css( "transition", "top 0.1s linear" );
        }
    })

    $('.toggle-icon-block .fa-minus').hide();

    $('.toggle-icon-block .fa-plus').click(function (e) {
        e.stopPropagation();
        console.log('plus click')
        $(this).parents('.header-menu-2').find('.fa-minus').hide();
        $(this).parents('.header-menu-2').find('.fa-plus').show();
        $(this).parents('.header-menu-2').find('.hover-bloc').removeClass('show-submenu');
        console.log($(this).parents('.header-menu-2'))
        $(this).parent().find('.fa-plus').hide();
        $(this).parent().find('.fa-minus').show();
        $(this).parents('.item').find('.hover-bloc').addClass('show-submenu');
    });
    $('.toggle-icon-block .fa-minus').click(function (e) { 
        e.stopPropagation();
        $(this).parent().find('.fa-minus').hide();
        $(this).parent().find('.fa-plus').show();
        $(this).parents('.item').find('.hover-bloc').removeClass('show-submenu');
    });

    $('.show-more-button').click(function (e) { 
        let query = $('.search-input').val();
        window.location.replace(`/search-result/product?query=${query}`);
    });

    if(window.innerWidth <= 990){
        $("#block_1").removeClass('fixed');
        $("#block_2").removeClass('fixed-menu');
    }
    function ReLoadImages(){
        $('img[data-lazysrc]').each( function(){
                $( this ).attr( 'src', $( this ).attr( 'data-lazysrc' ) );
            }
        );
    }

    document.addEventListener('readystatechange', event => {
        if (event.target.readyState === "interactive") {  //or at "complete" if you want it to execute in the most last state of window.
            ReLoadImages();
        }
    });
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>
