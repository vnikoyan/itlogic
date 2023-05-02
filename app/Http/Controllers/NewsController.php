<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class NewsController extends Controller
{
    public function view(Request $request) {
        $id = (int) $request->route('id');
        $languageIso = App::getLocale();
        $news = News::withTranslation($languageIso)->where('id', $id)->where('active', '1')->first();
        if (Voyager::translatable($news)) {
            $news = $news->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'news' => $news,
        ];
        return view('news.view', $toView);
    }

    public function index() {
        $languageIso = App::getLocale();
        $news = News::withTranslation($languageIso)->where('active', '1')->orderBy('id', 'DESC')->paginate(15);
        if (Voyager::translatable($news)) {
            $news = $news->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'news' => $news,
        ];
        return view('news.index', $toView);
    }
}
