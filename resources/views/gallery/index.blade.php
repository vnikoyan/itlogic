@extends('layouts.app')

@section('content')
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('gallery') }}">{{ __('messages.gallery') }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="gallery-bloc">
        <div class="basket-bloc-title">{{ __('gallery') }}</div>
        <div class="gallery-bloc-1 container d-flex justify-content-between align-items-center flex-wrap">
            @foreach ($gallery as $item)
                <div class="gallery-img" style="background-image: url('{{ Voyager::image( $item->photo ) }}');">
                    <div class="gallery-info">
                        <div class="gallery-info-title">{{ $item->name }}</div>
                        <div class="gallery-info-sub-title">{!! $item->description !!}</div>
                        <div class="gallery-info-btn">
                            <a href="{{ route('gallery.view', $item->id) }}">{{ __('messages.read_more') }}</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="page-bloc container d-flex justify-content-center align-items-center">
            <div class="page-left"><i class="fa fa-long-arrow-left"></i></div>
            <div class="page-number">1</div>
            <div class="page-right"><i class="fa fa-long-arrow-right"></i></div>
        </div>
    </div>
@endsection
