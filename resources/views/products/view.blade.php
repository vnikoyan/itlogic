@extends('layouts.app')

@section('content')
    <script>
        let sets = [];
    </script>
    @php
        $fmt = new NumberFormatter( 'hy_AM', NumberFormatter::CURRENCY );
        $pricesList = [($firstPrice->price - (($firstPrice->price / 100) * $firstPrice->discount))];
        foreach ($prices as $price){
        $pricesList[] = $price->price - (($price->price / 100) * $price->discount);
        }
        $minPrice = min($pricesList);
        $maxPrice = max($pricesList);
    @endphp
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/product.js') }}" defer></script>
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category', [$product->category, 0]) }}">{{ $category->name ?: __('messages.bc_category') }}</a></li>
                @if (isset($subcategory->name))
                    <li class="breadcrumb-item"><a href="{{ route('category', [$product->category, $product->subcategory]) }}">{{ $subcategory->name ?: __('messages.bc_category') }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="content-product container d-flex justify-content-between ">
        <div class="catalog-left">
            <div class="catalog-left-bloc">
                <div class="catalog-left-icons">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <a href="{{ Voyager::image($product->photo) }}" class="carousel-item active" data-fancybox="images" data-caption="{{ $product->title }}">
                                <img src="{{ Voyager::image($product->photo) }}"
                                     class="d-block w-100" alt="{{ $product->name  }}" style="object-fit: contain;height: 333px;object-fit: contain;">
                            </a>

                            @php
                                $images = json_decode($product->images);
                            @endphp
                            
                            @if ($images)
                                @foreach($images as $image)
                                    <a href="{{ Voyager::image($image) }}" class="carousel-item" data-fancybox="images" data-caption="{{ $product->title }}">
                                        <img src="{{ Voyager::image($image) }}"
                                             class="d-block w-100" alt="{{ $product->name  }}" style="object-fit: contain;height: 333px;object-fit: contain;">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev up-left" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next up-right" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalog-right">
            <div class="catalog-right-title">{{ $product->name }}</div>
            {{--<div class="catalog-right-title"><span> Sirman TC-12 DENVER</span> </div>--}}
            <div class="catalog-right-cost">{{ __('messages.cost') }}
                @if ($minPrice !== $maxPrice)
                    {{ $fmt->formatCurrency($minPrice, 'AMD') }} - {{ $fmt->formatCurrency($maxPrice, 'AMD') }}
                @else
                    {{ $fmt->formatCurrency($minPrice, 'AMD') }}
                @endif
                {{--{{ __('messages.amd') }}--}}</div>
            <div class="catalog-right-description">
                <ul>
                    @if ($product->features)
                        @php
                            $features = json_decode($product->features);
                        @endphp
                        @foreach ($features as $feature)
                            <li class="d-flex"><span><i class="fa fa-long-arrow-right"></i></span><span class="ul-inf">{{ $feature }}</span></li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>
    </div>
    <div class="attributes container">
        <div class="attributes-1 d-flex">
            <div class="title-attributes">{{ __('messages.size') }}</div>
            <div class="rad d-flex flex-wrap">
                @php
                    $dataSets = [];
                    $dataSets[$firstPrice->sizeName][] = $firstPrice->colorName;
                @endphp
                <input id="{{ $firstPrice->sizeName }}" type="radio" name="size" value="{{ $firstPrice->size }}" data-parent="{{ $firstPrice->colorName }}" data-price="{{ $firstPrice->price }}" data-discount="{{ $firstPrice->discount }}" checked /><label for="{{ $firstPrice->sizeName }}" id="label_{{ $firstPrice->sizeName }}">{{ $firstPrice->sizeName }}</label>
                @php
                    $size = [$firstPrice->size];
                @endphp
                @foreach ($prices as $index => $price)
                    <div>
                        @php
                            $index++;
                            $dataSets[$price->sizeName][] = $price->colorName ;
                        @endphp
                        @if (!in_array($price->size, $size))
                            @php
                                $size[] = $price->size;
                            @endphp
                            <input id="{{ $price->sizeName }}" type="radio" name="size" value="{{ $price->size }}" data-parent="{{ $price->colorName }}" data-price="{{ $price->price }}" data-discount="{{ $price->discount }}"/><label for="{{ $price->sizeName }}" id="label_{{ $price->sizeName }}">{{ $price->sizeName }}</label>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="attributes-1 d-flex">
            <div class="title-attributes">{{ __('messages.color') }}</div>
            <div class="rad d-flex flex-wrap">
                @php
                    $dataSets[$firstPrice->colorName][] = $firstPrice->sizeName ;
                    $key = 'color_images_'.$firstPrice->color;
                @endphp
                <input id="{{ $firstPrice->colorName }}"  class= "color-images" data-image="{{ (isset($$key)) ? $$key : '' }}" type="radio" name="color" value="{{ $firstPrice->color }}" data-parent="{{ $firstPrice->sizeName }}" data-price="{{ $firstPrice->price }}" data-discount="{{ $firstPrice->discount }}" checked/><label for="{{ $firstPrice->colorName }}" id="label_{{ $firstPrice->colorName }}">{{ $firstPrice->colorName }}</label>
                @php
                    $colors = [$firstPrice->color];
                @endphp
                @foreach ($prices as $index => $price)
                    <div>
                        @php
                            $index++;
                            $dataSets[$price->colorName][] = $price->sizeName ;
                        @endphp
                        @if (!in_array($price->color, $colors))
                            @php
                                $colors[] = $price->color;
                                $key = 'color_images_'.$price->color;
                            @endphp
                            <input id="{{ $price->colorName }}" class= "color-images" data-image="{{ (isset($$key)) ? $$key : '' }}" type="radio" name="color" value="{{ $price->color }}" data-parent="{{ $price->sizeName }}" data-price="{{ $price->price }}" data-discount="{{ $price->discount }}"/><label for="{{ $price->colorName }}" id="label_{{ $price->colorName }}">{{ $price->colorName }}</label>
                        @endif   
                    </div>
                @endforeach
                <input type="hidden" id="dataSet" value="{{ json_encode($dataSets) }}" hidden>
            </div>
        </div>


    </div>
    <div class="total container-fluid">
        <div class="total-bloc total-bloc-01 container d-flex justify-content-center align-items-center">
            <div class="total-bloc-1 d-flex align-items-center">
                <div class="total-bloc-title">{{ __('messages.count') }}</div>
                <div class="number">
                    <span class="minus" id="minus-view">-</span>
                    <input id="count" type="text" value="1" size="5" readonly/>
                    <span class="plus" id="plus-view">+</span>
                </div>
            </div>
            <div class="total-bloc-1 d-flex align-items-center">
                <div class="total-bloc-title">{{ __('messages.amount') }}</div>
                <div class="dram"><span id="amount">
                        @if ($firstPrice->discount  > 0)
                            {{ $fmt->formatCurrency(( $firstPrice->price - (($firstPrice->price / 100) * $firstPrice->discount)) , 'AMD') }}
                            <br>
                            <del>{{ $fmt->formatCurrency($firstPrice->price , 'AMD') }}</del>
                        @else
                            {{ $fmt->formatCurrency($firstPrice->price, 'AMD') }}
                        @endif
                    </span> {{--{{ __('messages.amd') }}--}}</div>
            </div>
            <div class="total-bloc-1 order-btn-1">
                <button id="checkout">{{ __('messages.order') }}</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="product_id" value="{{ $id }}" hidden>
    <div class="product-blog" id="product-blog"></div>
    <div class="description-content container">
        <div class="description-content-title">{{ __('messages.description') }}</div>
        <div class="description-content-subtitle">
            {!! $product->full_description !!}
        </div>


    </div>
    <script>
        $( document ).ready(function() {

            productImagesSlider();

            $('.color-images').on('change', function() {
                productImagesSlider()
            })

            function productImagesSlider(){
                let photos  = $('input[name*="color"]:checked').data('image');
                if(photos.length > 0){
                    $('.carousel-inner').html("");
                    photos.forEach((photo, index) => {
                        $('.carousel-inner').append(`
                        <a href="${location.origin + '/storage/' + photo}" class="carousel-item ${index === 0 && 'active'}" data-fancybox="images" data-caption="">
                            <img src="${location.origin + '/storage/' +  photo}" class="d-block w-100" alt="bags" style="object-fit: contain;height: 333px;object-fit: contain;">
                            </a>
                            `);
                        });
                    }
                }
        })
    </script>
@endsection
