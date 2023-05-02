<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function index(Request $request){
        $iso = $request->route('iso');
        if (array_key_exists($iso, Config::get('languages'))) {
            Session::put('applocale', $iso);
           // dd(Session::get('applocale'));
        }
        return Redirect::back();
    }
}
