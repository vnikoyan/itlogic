@extends('layouts.app')

@section('content')
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category', [$category->id, 0]) }}">{{ $category->name }}</a></li>
                @if ($sub_category)
                    <li class="breadcrumb-item active"><a href="{{ route('category', [$category->id, $sub_category->id]) }}">{{ $sub_category->name }}</a></li>
                @endif
            </ol>
        </nav>
    </div>
    <div class="popular-models container">
        <div class="popular-models-title">{{ __('messages.catalog_title') }}</div>
        <div class="popular-models-bloc container">
            <div class="for-fixed-block">
                <div class="change-position">
                    <div class="filter-container">
                        <div class="sidebar-container">
                            <div class="widget">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <button id="filterButton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#category-models" aria-controls="category-models" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="category-models">
                                <div class="category-models">
                                    <form action="" method="GET" id="filter_form">
                                        <div class="category">
                                            <div class="category-title">{{ __('messages.color') }}</div>
                                            <ul class="rad2">
                                                @foreach ($filter_colors as $color)
                                                @if (in_array($color->id, $color_filter, false))
                                                <li><input onchange="doFilter()" id="color_{{ $color->id }}" name="color[]" type="checkbox" value="{{ $color->id }}" checked/><label for="color_{{ $color->id }}" >{{ $color->name }}</label></li>
                                                @else
                                                <li><input onchange="doFilter()" id="color_{{ $color->id }}" name="color[]" type="checkbox" value="{{ $color->id }}"/><label for="color_{{ $color->id }}">{{ $color->name }}</label></li>
                                                @endif
                                                @endforeach
                                            </ul>
            
                                        </div>
                                        <div class="category">
                                            <div class="category-title">{{ __('messages.size') }}</div>
                                            <ul class="rad2">
                                                @foreach ($filter_sizes as $size)
                                                @if (in_array($size->id, $size_filter, false))
                                                        <li><input onchange="doFilter()" id="size_{{ $size->id }}" name="size[]" type="checkbox" value="{{ $size->id }}" checked/><label for="size_{{ $size->id }}">{{ $size->name }}</label></li>
                                                        @else
                                                        <li><input onchange="doFilter()"
                                                            id="size_{{ $size->id }}" name="size[]" type="checkbox" value="{{ $size->id }}"/><label for="size_{{ $size->id }}">{{ $size->name }}</label></li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                        
                                                    </div>
                                    </form>
                                </div>
                        </div>
                        </nav>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="d-flex flex-column spl-5">
        <div class="d-flex flex-wrap justify-content-between content-dynamic-height">
            </nav>
            <div class="d-flex flex-column spl-5 w-100">
                <div class="d-flex flex-wrap justify-content-between ">
                    @foreach($products as $index => $product)
                        @if (count($products) > 15)
                            @if ($index < 15)
                                <div class="items">
                                    <div class="discounts-bloc-2">
                                        <div class="discounts-bloc-content w-100 m-0">
                                            <div class="disc-icon">
                                                <img style="object-fit: contain;" src="{{ Voyager::image($product->photo) }}" alt="{{ $product->getTranslatedAttribute('name')  }}"/>
                                            </div>
                                            <div class="disc-title">{{ $product->getTranslatedAttribute('name')  }}</div>
                                            <div class="disc-button">
                                                <a href="{{ route('product', $product->id) }}">{{ __('messages.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @else
                            <div class="items">
                                <div class="discounts-bloc-2">
                                    <div class="discounts-bloc-content w-100 m-0">
                                        <div class="disc-icon">
                                            <img style="object-fit: contain;" src="{{ Voyager::image($product->photo) }}" alt="{{ $product->getTranslatedAttribute('name')  }}"/>
                                        </div>
                                        <div class="disc-title">{{ $product->getTranslatedAttribute('name')  }}</div>
                                        <div class="disc-button">
                                            <a href="{{ route('product', $product->id) }}">{{ __('messages.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="w-100">
                    <div class="boxes-baner d-flex justify-content-between align-items-start container">
                        <div class="cash-boxes col-6">
                            <div class="cash-boxes-title">{{ $ad->name }}</div>
                            <div class="cash-boxes-subtitle">
                                {!! $ad->description !!}
                            </div>
                            <div class="cash-boxes-btn">
                                @if ($ad->url_target = 1)
                                    <a href="{{ $ad->url  }}">{{ __('messages.read_more') }}</a>
                                @elseif($ad->url_target = 2)
                                    <a href="{{ $ad->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif($ad->url_target = 3)
                                    <a href="{{ $ad->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif($ad->url_target = 4)
                                    <a href="{{ $ad->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="boxes-baner-icon">
                            <img src="{{ Voyager::image( $ad->photo ) }}" alt="{{ $ad->name }}">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                    @foreach($products as $index => $product)
                        @if (count($products) > 15)
                            @if ($index >= 15)
                                <div class="items">
                                    <div class="discounts-bloc-2">
                                        <div class="discounts-bloc-content w-100 m-0">
                                            <div class="disc-icon">
                                                <img src="{{ Voyager::image($product->photo) }}" alt="{{ $product->getTranslatedAttribute('name')  }}"/>
                                            </div>
                                            <div class="disc-title">{{ $product->getTranslatedAttribute('name')  }}</div>
                                            <div class="disc-button">
                                                <a href="{{ route('product', $product->id) }}">{{ __('messages.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    <style>
        .for-fixed-block{
            position: relative;
            width: 270px;
        }
    </style>
    <script>
        let position = document.querySelector(".change-position") 
        let content = document.querySelector(".content-dynamic-height");
        let filter = document.querySelector(".popular-models .category-models");
        let filterHeight = filter.offsetHeight;
        let contentHeight = content.offsetHeight - 380;
        let block = document.querySelector(".for-fixed-block");
        block.style.height = contentHeight + 'px';
        $( ".popular-models .popular-models-bloc .navbar" ).css( "border", "0" );
        $( ".navbar-expand-lg .navbar-collapse" ).css( "height", filterHeight + "px" );
        $( ".navbar-expand-lg .navbar-collapse" ).css( "background-color", "#ffefd8" );
        if(filterHeight > 380){
            $( ".navbar-expand-lg .navbar-collapse" ).css( "height", "380px" );
            $( ".navbar-expand-lg .navbar-collapse" ).css( "overflow-y", "scroll" );
        }
        $( ".navbar-collapse" ).css( "align-items", "unset" );
        $(window).scroll(function() {
            if(contentHeight > 380){
                if($(this).scrollTop() >= contentHeight){
                    position.style.position = "absolute";
                    position.style.top = "calc(100% - 30px)";
                    position.style.transition = "all 0.8s ease-out";
                    position.style.zIndex = "10000";
                }else if($(this).scrollTop() <= 150){
                    position.style.position = "absolute";
                    position.style.top = "0";
                    position.style.transition = "all 0.4s ease-out";
                    position.style.zIndex = "10000";
                }else{
                    position.style.top = "140px";
                    position.style.position = "fixed";
                    position.style.transition = "all 0.4s ease-out";
                    position.style.zIndex = "10000";
                }
            }
        })
        if(window.innerWidth <= 990){
            block.style.height = 'inherit'
            block.classList.remove('for-fixed-block');
            position.classList.remove('change-position');
        }

        function doFilter() {
            let screenSize = +$(document).width();
            if(screenSize > 700){
                document.getElementById('filter_form').submit()
            } else {
                $('#filterButton').on('click', function () {
                    if (screenSize <= 700){
                        if($('#category-models').hasClass('show')){
                            document.getElementById('filter_form').submit()
                        }
                    }
                });
            }
        }
    </script>
@endsection
