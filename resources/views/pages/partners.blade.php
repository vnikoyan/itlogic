@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="txtpart">
            <div class="bread-crumbs container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('partners') }}">{{ __('messages.partners') }}</a></li>
                    </ol>
                </nav>
            </div>
            <h4>{{ $page->name }}</h4>
        </div>

        <div id="picturesPart">
            <div class="d-flex justify-content-between align-items-center flex-wrap trust-parent">
                @php
                $images = json_decode($page->images);
                @endphp
                @if ($images)
                    @foreach($images as $image)
                    <div class="trust_us-bloc">
                            <div class = "trust-us-block-section">
                                <img src="{{ Voyager::image($image) }}" style="width:100%;height:auto;"/>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
