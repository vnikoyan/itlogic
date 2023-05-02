@extends('layouts.app')

@section('content')
    <div class="bread-crumbs container ab-us">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.bc_home') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('about_us') }}">{{ __('messages.about_company') }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="about-us-bloc container">
        <div class="about-us-bloc-title">{{ $page->name }}</div>
        <div class="about-us-bloc-text about-us-bloc-new-text">
            {!! $page->text !!}
        </div>

    </div>
    <div class="contacts-bloc ">
        <div class="contacts-title container bd-us-2"><?php echo e(__('messages.contacts')); ?></div>
        <div class="map container-fluid col-12 wow fadeInUp map-embed" style="visibility: visible; animation-name: fadeInUp;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3047.7743706923957!2d44.50158141567981!3d40.191834479391815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zINCQ0YDQvNC10L3QuNGPLCDQsy4g0JXRgNC10LLQsNC9INGD0LsuINCcLiDQkdCw0LPRgNCw0LzRj9C90LAgMjUsINGB0YIuIDY4!5e0!3m2!1sru!2s!4v1594049275271!5m2!1sru!2s" width="100%" height="435" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                        <div class="cont-box-1"><a href="mailto:sales@logic.am">sales@logic.am</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
