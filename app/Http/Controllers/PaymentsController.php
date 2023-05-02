<?php

namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class PaymentsController extends Controller
{
    public function index(){
        $languageIso = App::getLocale();
        $page = Pages::where('slug', 'payment')->first();
        if (Voyager::translatable($page)) {
            $page = $page->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'page' => $page
        ];
        return view('pages.payments', $toView);
    }
}
