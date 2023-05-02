@extends('layouts.app')

@section('content')
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('payments') }}">{{ __('messages.payment') }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="payment-bloc container">
        <div class="payment-bloc-title">{{ $page->name }}</div>
        <div class="payment-bloc-text">
            {!! $page->text !!}
        </div>
    </div>
@endsection
