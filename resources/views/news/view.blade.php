@extends('layouts.app')

@section('content')
    <div class="bread-crumbs container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href={{ route('news.view', $news->id) }}"">{{ $news->title }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="news-inside-bloc container">
        <div class="news-inside-title">{{ $news->title }}</div>
        <div class="news-inside-icon">
            <img src="{{ Voyager::image($news->photo) }}" alt="{{ $news->title }}"/>
        </div>
        <div class="news-inside-info">
            {!! $news->full_text !!}
        </div>
    </div>
@endsection
