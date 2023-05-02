@extends('layouts.app')

@section('content')
    <div class="popular-models container">
        <div class="popular-models-title">{{ __('messages.search_result_title') }}</div>
        <div class="popular-models-block container">
        <div class="d-flex flex-column spl-5 w-100">
        <div class="d-flex flex-wrap justify-content-between content-dynamic-height">
            <div class="d-flex flex-column w-100">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text btn btn-light" id="basic-addon1"><img src="{{ asset('images/search-icon.png') }}" width="20"></span>
                    </div>
                    <input value="{{$query}}" type="text" class="form-control global-search-input" placeholder="{{ __('modal.search_placeholder') }}" >
                </div>
                <div class="d-flex flex-wrap justify-content-between ">
                    @if (count($products))
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
                    @else
                        <div class="news-bloc-title w-100 text-center">{{  __('modal.no_result') }}</div>
                    @endif
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
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.input-group-text').click(function (e) { 
                searchQueryUpdate()
            });
    
            $('.global-search-input').keypress(function (e) { 
                if (e.which == 13) {
                    searchQueryUpdate()
                }
            });
    
            function searchQueryUpdate(){
                let query = $('.global-search-input').val();
                window.location.replace(`product?query=${query}`);
            }
        });
    
    </script>
@endsection

