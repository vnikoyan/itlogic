<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Clients;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $languageIso = App::getLocale();
        $ad_1 = Ads::where('code', 1)->first();
        if (Voyager::translatable($ad_1)) {
            $ad_1 = $ad_1->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $ad_2 = Ads::where('code', 2)->first();
        if (Voyager::translatable($ad_2)) {
            $ad_2 = $ad_2->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $ad_3 = Ads::where('code', 3)->first();
        if (Voyager::translatable($ad_3)) {
            $ad_3 = $ad_3->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $discounts = Products::join('product_prices', 'product_prices.product', '=', 'products.id')
            ->where('product_prices.discount', '>', 0)
            ->orderBy('product_prices.id', 'DESC')
            ->groupBy('products.id')
            ->select('products.*')->limit(16)->get();
        if (Voyager::translatable($discounts)) {
            $discounts = $discounts->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $newProducts = Products::orderBy('id', 'DESC')
            ->limit(16)->get();
        if (Voyager::translatable($newProducts)) {
            $newProducts = $newProducts->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $clients = Clients::where('active', 1)->get();
        if (Voyager::translatable($clients)) {
            $clients = $clients->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $mostViews = Products::where('views', '>', 0)
            ->orderBy('views', 'DESC')
            ->groupBy('products.id')
            ->select('products.*')->limit(16)->get();
        if (Voyager::translatable($mostViews)) {
            $mostViews = $mostViews->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'ad_1' => $ad_1,
            'ad_2' => $ad_2,
            'ad_3' => $ad_3,
            'discounts' => $discounts,
            'newProducts' => $newProducts,
            'clients' => $clients,
            'mostViews' => $mostViews,
            ];
        return view('home', $toView);
    }
}
