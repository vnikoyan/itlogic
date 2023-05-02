<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class GalleryController extends Controller
{

    public function view(Request $request) {
        $id = (int) $request->route('id');
        $languageIso = App::getLocale();
        $gallery = Gallery::withTranslation($languageIso)->where('id', $id)->where('active', '1')->first();
        if (!isset($gallery->id)){
            abort(404);
        }
        if (Voyager::translatable($gallery)) {
            $gallery = $gallery->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'gallery' => $gallery,
        ];
        return view('gallery.view', $toView);
    }

    public function index() {
        $languageIso = App::getLocale();
        $gallery = Gallery::withTranslation($languageIso)->where('active', '1')->orderBy('id', 'DESC')->paginate(56);
        if (Voyager::translatable($gallery)) {
            $gallery = $gallery->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'gallery' => $gallery,
        ];
        return view('gallery.index', $toView);
    }
}
