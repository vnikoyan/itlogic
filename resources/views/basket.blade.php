@extends('layouts.app')

@section('content')
    @php
        $fmt = new NumberFormatter( 'hy_AM', NumberFormatter::CURRENCY );
    @endphp
    <script src="{{ asset('js/basket.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="bread-crumbs b1 container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('basket') }}">{{ __('messages.basket') }}</a></li>
            </ol>
        </nav>
    </div>

    <div class="basket-bloc container">
        <div class="basket-bloc-title">{{ __('messages.basket') }}</div>
        <form id="checkoutForm" action="{{ route('basket.checkout.done') }}" class="basket-form" method="POST">
            @csrf
            <div class="row justify-content-center"> 
                <div class ="col-md-12 mb-4 text-center">
                    <input type="text" id="fname" name="full_name" placeholder="{{ __('messages.full_name') }}" required>
                </div>
                <div class ="col-md-12 mb-4 text-center">
                    <input type="text" id="lname" name="address" placeholder="{{ __('messages.address') }}" required>
                </div>
                <div class ="col-md-12 mb-4 text-center">
                    <input onkeypress="return /[0-9]/i.test(event.key)" type="number" id="num" name="phone" placeholder="{{ __('messages.phone') }}" required>
                    <input type="text" id="tax" name="tax_number" placeholder="{{ __('messages.tax_number') }}">
                </div>
                <div class ="mb-5 text-center delivery-section justify-content-between align-items-center">  
                    <span class="mob-box1 m-0 block">
                        <input type="radio" id="pickup" name="delivery" value="1 " checked required>
                        <label class="male" for="pickup"><i class="radio-img"><img src="/img/icons/box1.png" alt="#"/></i> {{ __('messages.pickup') }}</label>
                    </span>
                    <span class="mob-box2 block">
                        <input type="radio" id="delivery" name="delivery" value="2" required>
                        <label class="male" for="delivery"><i class="radio-img"><img src="/img/icons/box2.png" alt="#"/></i>{{ __('messages.delivery') }}</label>
                    </span>
                </div>
        </div>
        </form>
        <div class="selected-item">
            @php
            $amount = 0;
            @endphp
            @if (isset($basket))
                @foreach($basket as $b)
                    <div class="selected-item-1" id="box_{{ $b->bid }}">
                        <div class="sel-item-1 d-flex justify-content-start align-items-center ">
                            <div class="selected-icon">
                                <div class="selected-product">
                                    <img src="{{ Voyager::image($b->photo) }}" alt="{{ $b->name }}"/>
                                </div>
                            </div>
                            <div class="selected-name">{{ $b->name }}</div>
                            <div class="sel-mob d-flex justify-content-center align-items-center">
                                <div class="selected-quantity">
                                    <div class="number">
                                        <span class="minus basket-minus" id="minus" data-count="count_{{ $b->bid }}" data-bid="{{ $b->bid }}">-</span>
                                        <input type="text" id="count_{{ $b->bid }}" data-product="{{ $b->bid }}" value="{{ $b->count }}" size="5" readonly/>
                                        <span class="plus basket-plus" id="plus" data-count="count_{{ $b->bid }}" data-bid="{{ $b->bid }}">+</span>
                                    </div>
                                </div>
                                <div class="selected-dram">
                                    @if ($b->price->discount > 0)
                                        @php
                                            $price = $b->price->price  - (($b->price->price / 100) * $b->price->discount);
                                            $price *= $b->count
                                        @endphp
                                        <span id="amount_{{ $b->bid }}">{{ $fmt->formatCurrency($price, 'AMD') }}</span>
                                    @else
                                        @php
                                            $price = $b->price->price *  $b->count;
                                        @endphp
                                        <span id="amount_{{ $b->bid }}">{{ $fmt->formatCurrency($price, 'AMD') }}</span>
                                    @endif
                                    @php
                                        $amount += $price;
                                    @endphp
                                    <input type="hidden" id="cost_{{ $b->bid }}"  value="{{ $price }}" hidden>
                                    {{--{{ __('messages.amd') }}--}}</div>
                            </div>
                            <div class="selected-close">
                                <button data-bid="{{ $b->bid }}" type="button" class="close remove" aria-label="Close">
                                    <span data-bid="{{ $b->bid }}"  aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="order-total d-flex justify-content-between">
            <div class="col-7 text-order">
                <p>
                    {{ __('messages.order_text_1') }}
                </p>
                <p>
                    {{ __('messages.order_text_2') }}
                </p>
            </div>
            <div class="col btn-order">
                <div class="total-bloc-1 d-flex align-items-center">
                    <div class="total-bloc-title">{{ __('messages.amount') }}</div>
                    <div class="dram"><span id="totalAmount">{{ $fmt->formatCurrency($amount, 'AMD') }}</span> {{--{{ __('messages.amd') }}--}}</div>
                </div>
                <input type="hidden" value="{{ $amount }}" id="amount_h" hidden>
                <div class="total-bloc-1 order-btn">
                    <button id="finishCheckout" onclick="finishSubmit()" @if (!isset($basket) || count($basket) < 1) disabled @endif>{{ __('messages.checkout') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function finishSubmit() {
            let firstName = document.getElementById('fname');
            let address = document.getElementById('lname');
            let phone = document.getElementById('num');
            let tax = document.getElementById('tax');
            if(firstName.value === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ __("messages.valid_fname") }}'
                })
            }else if(address.value === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ __("messages.valid_lname") }}'
                })
            }else if(!phone.value){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ __("messages.valid_phone") }}'
                })
            } else if(!tax.value){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ __("messages.valid_tin") }}'
                })
            } else {
                document.getElementById('checkoutForm').submit();
            }
        }
    </script>
@endsection
