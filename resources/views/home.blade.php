@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/owl.theme.default.min.css') }}">
    <script src="{{ asset('dist/owl.carousel.min.js') }}" defer></script>
    <div class="content container">
        <div class="banner d-flex justify-content-between">
            <div class="left-col">
                <div class="banner-info  d-flex justify-content-between">
                    <div class="col-7 terminal-1">
                        <div class="col-title">{{ $ad_1->name }}</div>
                        <div class="col-subtitle">
                            {!! $ad_1->description !!}
                        </div>
                        <div class="col-button">
                            @if ($ad_1->url_target = 1)
                                <a href="{{ $ad_1->url  }}">{{ __('messages.read_more') }}</a>
                            @elseif($ad_1->url_target = 2)
                                <a href="{{ $ad_1->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                            @elseif($ad_1->url_target = 3)
                                <a href="{{ $ad_1->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                            @elseif($ad_1->url_target = 4)
                                <a href="{{ $ad_1->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-6 img-ban" style="background-image: url('{{ Voyager::image( $ad_1->photo ) }}');"></div>
                </div>
            </div>
            <div class="right-col d-flex flex-column">
                <div class="right-col-1 d-flex">
                <div class="col">
                    <div class="col-title">{{ $ad_2->name }}</div>
                    <div class="col-subtitle">
                        {!! $ad_2->description !!}
                    </div>
                    <div class="col-button">
                        @if ($ad_2->url_target = 1)
                            <a href="{{ $ad_2->url  }}">{{ __('messages.read_more') }}</a>
                        @elseif($ad_2->url_target = 2)
                            <a href="{{ $ad_2->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                        @elseif($ad_2->url_target = 3)
                            <a href="{{ $ad_2->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                        @elseif($ad_2->url_target = 4)
                            <a href="{{ $ad_2->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                        @endif
                    </div>
                    </div>
                    <div class="col img-ban-2" style="background-image: url('{{ Voyager::image( $ad_2->photo ) }}');"></div>
                </div>
                <div class="right-col-2 d-flex">
                <div class="col">
                    <div class="col-title">{{ $ad_3->name }}</div>
                    <div class="col-subtitle">{!! $ad_3->description !!}</div>
                    <div class="col-button">
                        @if ($ad_3->url_target = 1)
                            <a href="{{ $ad_3->url  }}">{{ __('messages.read_more') }}</a>
                        @elseif($ad_3->url_target = 2)
                            <a href="{{ $ad_3->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                        @elseif($ad_3->url_target = 3)
                            <a href="{{ $ad_3->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                        @elseif($ad_3->url_target = 4)
                            <a href="{{ $ad_3->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                        @endif
                    </div>
                 </div>
                    <div class="col img-ban-2" style="background-image: url('{{ Voyager::image( $ad_3->photo ) }}');"></div>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators0" class="carousel slide mob-version" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner-mob  d-flex flex-column">
                      <div class="section-mob-1 d-flex flex-column ">

                         <div class="col">
                              <div class="section-title">{{ $ad_1->name }}</div>
                              <div class="section-subtitle">
                                {!! $ad_1->description !!}
                              </div>
                              <div class="section-button">
                                @if (intval($ad_1->url_target) === 1)
                                    <a href="{{ $ad_1->url  }}">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_1->url_target) === 2)
                                    <a href="{{ $ad_1->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_1->url_target) === 3)
                                    <a href="{{ $ad_1->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_1->url_target) === 4)
                                    <a href="{{ $ad_1->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                                @endif
                              </div>
                         </div>
                         <div class="col">
                            <div class="img-ban d-flex justify-content-end" style="background-image: url('{{ Voyager::image( $ad_1->photo ) }}');"></div>
                         </div>
                      </div>
                    </div>

                </div>



                <div class="carousel-item">
                    <div class="banner-mob  d-flex flex-column">

                        <div class="section-mob-2  d-flex flex-column">
                          <div class="col">
                            <div class="section-title">{{ $ad_2->name }}</div>
                            <div class="section-subtitle">
                                {!! $ad_2->description !!}
                            </div>
                            <div class="section-button">
                                @if (intval($ad_2->url_target) === 1)
                                    <a href="{{ $ad_2->url  }}">Подробнее</a>
                                @elseif(intval($ad_2->url_target) === 2)
                                    <a href="{{ $ad_2->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_2->url_target) === 3)
                                    <a href="{{ $ad_2->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_2->url_target) === 4)
                                    <a href="{{ $ad_2->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                                @endif
                            </div>
                           </div>


                          <div class="col">
                            <div class="img-ban-2 d-flex justify-content-end" style="background-image: url('{{ Voyager::image( $ad_2->photo ) }}');"></div>
                          </div>
                       </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="banner-mob  d-flex flex-column">
                        <div class="section-mob-3 d-flex flex-column">
                          <div class="col">
                                <div class="section-title">{{ $ad_3->name }}</div>
                                <div class="section-subtitle">
                                {!! $ad_3->description !!}
                                </div>
                                <div class="section-button">
                                @if (intval($ad_3->url_target) === 1)
                                    <a href="{{ $ad_3->url  }}">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_3->url_target) === 2)
                                    <a href="{{ $ad_3->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_3->url_target) === 3)
                                    <a href="{{ $ad_3->url  }}" target="_blank">{{ __('messages.read_more') }}</a>
                                @elseif(intval($ad_3->url_target) === 4)
                                    <a href="{{ $ad_3->url  }}" target="_top">{{ __('messages.read_more') }}</a>
                                @endif
                                </div>

                          </div>


                          <div class="col">
                            <div class="img-ban-2 d-flex justify-content-end" style="background-image: url('{{ Voyager::image( $ad_3->photo ) }}');"></div>
                          </div>

                         </div>
                    </div>
                </div>
            </div>
             <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators0" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators0" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators0" data-slide-to="2"></li>
              </ol>
        </div>
        <div class="new_product">
            <div class="discounts-01 d-flex justify-content-between align-items-center">
                <div class="discounts-1">{{ __('messages.new_products') }}</div>
                <div id="new_products" class="discounts-2 owl-dots">
                </div>
            </div>
            <div class="owl-carousel new_products">
                @foreach ($newProducts as $index => $discount)
                    <div class="discounts-bloc-1">
                        <div class="discounts-bloc-content">
                            <div class="disc-icon">
                                <img data-lazysrc="{{ Voyager::image( $discount->photo ) }}" alt="{{ $discount->name }}"/>
                            </div>
                            <div class="disc-title">{{ $discount->name }}</div>
                            <div class="disc-subtitle">
                                {!! $discount->short_description !!}
                            </div>
                            <div class="disc-button">
                                <a href="{{ route('product', $discount->id) }}">{{ __('messages.read_more') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="discounts">
            <div class="discounts-02 d-flex justify-content-between align-items-center">
                <div class="discounts-1">{{ __('messages.discounts') }}</div>
                <div id="discounted_items_dots" class="discounts-2 owl-dots">
                </div>
            </div>

            <div class="owl-carousel discounted_items">
                @foreach ($discounts as $index => $discount)
                    <div class="discounts-bloc-1">
                        <div class="discounts-bloc-content">
                            <div class="disc-icon">
                                <img data-lazysrc="{{ Voyager::image( $discount->photo ) }}" alt="{{ $discount->name }}"/>
                            </div>
                            <div class="disc-title">{{ $discount->name }}</div>
                            <div class="disc-subtitle">
                                {!! $discount->short_description !!}
                            </div>
                            <div class="disc-button">
                                <a href="{{ route('product', $discount->id) }}">{{ __('messages.read_more') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="trust_us">
            <div class="discounts-03 d-flex justify-content-between align-items-center">
                <div class="discounts-1">{{ __('messages.our_customers') }}</div>
            </div>
            <div class="justify-content-between align-items-center flex-wrap mob-hide">
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/carrefour 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/Kaiser 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/Logo-200x200 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/evrika 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/parma 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="img/partners-icons/city 1.png" alt="#"/>
                </div>
            </div>
            <div class="justify-content-between align-items-center flex-wrap trust-parent slider mob-show">
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/carrefour 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/Kaiser 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/Logo-200x200 1.png" alt="#"/>
                </div>
            </div>
            <div class="justify-content-between align-items-center flex-wrap trust-parent slider1 mob-show">
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/evrika 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/parma 1.png" alt="#"/>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mob-slide" src="img/partners-icons/city 1.png" alt="#"/>
                </div>
            </div>
        </div>
        <div class="new_product">
            <div class="discounts-02 d-flex justify-content-between align-items-center">
                <div class="discounts-1">{{ __('messages.most_viewed') }}</div>
                <div id="most_viewed" class="discounts-2 owl-dots">
                </div>
            </div>
            <div class="owl-carousel most_viewed">
                @foreach ($mostViews as $index => $discount)
                    <div class="discounts-bloc-1">
                        <div class="discounts-bloc-content">
                            <div class="disc-icon">
                                <img data-lazysrc="{{ Voyager::image( $discount->photo ) }}" alt="{{ $discount->name }}"/>
                            </div>
                            <div class="disc-title">{{ $discount->name }}</div>
                            <div class="disc-subtitle">
                                {!! $discount->short_description !!}
                            </div>
                            <div class="disc-button">
                                <a href="{{ route('product', $discount->id) }}">{{ __('messages.read_more') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="contacts-bloc" id="contacts_section">
        <div class="contacts-title container"><?php echo e(__('messages.contacts')); ?></div>
        <div class="map container-fluid col-12 wow fadeInUp map-embed"
             style="visibility: visible; animation-name: fadeInUp;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3047.7743706923957!2d44.50158141567981!3d40.191834479391815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zINCQ0YDQvNC10L3QuNGPLCDQsy4g0JXRgNC10LLQsNC9INGD0LsuINCcLiDQkdCw0LPRgNCw0LzRj9C90LAgMjUsINGB0YIuIDY4!5e0!3m2!1sru!2s!4v1594049275271!5m2!1sru!2s"
                width="100%" height="435" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <div class="container">
                <div class="contacts-box ">
                    <div class="outside d-flex  align-items-center">
                        <div class="cont-box-1"><i class="fa fa-map-marker"></i></div>
                        <div class="cont-box-1">Армения, г. Ереван <br> ул. М. Баграмяна 31А, ст. 68</div>

                    </div>
                    <div class="telephone d-flex  align-items-center">
                        <div class="cont-box-1"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="cont-box-1"><a href="tel:010-22-58-88">+(374) 10 225 888</a> <br> <a href="tel:041-22-58-88">+(374) 41 225 888</a></div>
                    </div>
                    <div class="post d-flex  align-items-center">
                        <div class="cont-box-1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="cont-box-1"> <a href="mailto:sales@logic.am"> sales@logic.am </a> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                asNavFor: '.slider1'
            });
            $('.slider1').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                asNavFor: '.slider'
            });
            $(".discounted_items").owlCarousel({
                items: 4,
                loop: true,
                freeDrag: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                animateIn: true,
                dots: true,
                dotsEach: false,
                dotsContainer: '#discounted_items_dots',
                responsive:{
                    0:{
                        dots: false,
                        center: true,
                        items:1
                    },
                    600:{
                        dots: false,
                        center: true,
                        items: 2
                    },
                    850:{
                        dots: false,
                        center: true,
                        items:3
                    },
                    1200:{
                        items:4,
                    }
                }
            });
            $(".new_products").owlCarousel({
                items: 4,
                loop: true,
                freeDrag: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                animateIn: true,
                dots: true,
                dotsEach: false,
                dotsContainer: '#new_products',
                responsive:{
                    0:{
                        dots: false,
                        center: true,
                        items:1
                    },
                    600:{
                        dots: false,
                        center: true,
                        items: 2
                    },
                    850:{
                        dots: false,
                        center: true,
                        items: 3
                    },
                    1200:{
                        items:4,
                    }
                }
            });
            $(".most_viewed").owlCarousel({
                items: 4,
                loop: true,
                freeDrag: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                animateIn: true,
                dots: true,
                dotsEach: false,
                dotsContainer: '#most_viewed',
                responsive:{
                    0:{
                        dots: false,
                        center: true,
                        items:1
                    },
                    600:{
                        dots: false,
                        center: true,
                        items:2
                    },
                    850:{
                        dots: false,
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
