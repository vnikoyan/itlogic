@extends('layouts.app')

@section('content')
<div class="bread-crumbs container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
        </ol>
    </nav>
</div>
<div class="news-bloc container">
    <div class="news-bloc-title">{{ __('messages.news_and_promos') }}</div>
    @foreach($news as $post)
        <div style="background-color: {{ $post->color }}" class="boxes-baner-1 d-flex justify-content-between align-items-start">
            <div class="cash-boxes col">
                <div class="cash-boxes-title">{{ $post->getTranslatedAttribute('title') }}</div>
                <div class="cash-boxes-subtitle">
                    {!! $post->getTranslatedAttribute('short_text') !!}
                </div>
                <div class="cash-boxes-btn">
                    <a href="{{ route('news.view', $post->id) }}">{{__('messages.read_more')}}</a>
                </div>
            </div>
            <div class="boxes-baner-icon">
                <img src="{{ Voyager::image($post->photo) }}" alt="{{ $post->getTranslatedAttribute('short_text') }}">
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-between mb-3">
        {{ $news->links() }}
    </div>
</div>
@endsection
