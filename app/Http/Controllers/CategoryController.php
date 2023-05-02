<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Categories;
use App\Colors;
use App\ProductPrices;
use App\Products;
use App\Sizes;
use App\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class CategoryController extends Controller
{
    public function index(Request $request){
        $languageIso = App::getLocale();
        $category = (int) $request->route('id');
        $subcategory = (int) $request->route('sub');
        $size = (array) $request->get('size');
        $color = (array) $request->get('color');
        $checkCategory = Categories::where('id', $category)->first();
        if (!isset($checkCategory->id)){
            abort(404);
        }
        if (Voyager::translatable($checkCategory)) {
            $checkCategory  = $checkCategory->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        if ($subcategory){
            $checkSub = SubCategories::where('id', $subcategory)->first();
            if (!isset($checkSub->id)){
                abort(404);
            }
            if (Voyager::translatable($checkSub)) {
                $checkSub  = $checkSub->translate($languageIso, getenv('DEF_LANGUAGE'));
            }
        }
        $products = new Products();
        if ($color || $size){
            $products = $products->join('product_prices', 'product_prices.product', '=', 'products.id');
            $products = $products->select('products.*');
            $products = $products->groupBy('products.id');
        }
        if ($color){
            $products = $products->whereIn('color', $color);
        }
        if ($size){
            $products = $products->whereIn('size', $size);
        }
        if ($category){
            $products = $products->where('category', $category);
        }
        if ($subcategory){
            $products = $products->where('subcategory', $subcategory);
        }
        $products = $products->paginate(56);
        if (Voyager::translatable($products)) {
            $products = $products->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $ad = Ads::inRandomOrder()->first();
        if (Voyager::translatable($ad)) {
            $ad = $ad->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $colors = ProductPrices::join('products', 'product_prices.product', '=', 'products.id')
            ->join('colors', 'colors.id', '=', 'product_prices.color')
            ->select('colors.id')
            ->groupBy('colors.color');
        if ($category){
            $colors = $colors->where('products.category', $category);
        }
        if ($subcategory){
            $colors = $colors->where('products.subcategory', $subcategory);
        }
        $colors = $colors->get();

        $cIds = [];
        foreach ($colors as $c){
            $cIds[] = $c->id;
        }
        $colors = Colors::whereIn('id', $cIds)->get();
        if (Voyager::translatable($colors)) {
            $colors = $colors->translate($languageIso, getenv('DEF_LANGUAGE'));
        }


        $sizes = ProductPrices::join('products', 'product_prices.product', '=', 'products.id')
            ->join('sizes', 'sizes.id', '=', 'product_prices.size')
            ->select('sizes.id')
            ->groupBy('sizes.id');
        if ($category){
            $sizes = $sizes->where('products.category', $category);
        }
        if ($subcategory){
            $sizes = $sizes->where('products.subcategory', $subcategory);
        }
        $sizes = $sizes->get();
        $cIds = [];
        foreach ($sizes as $c){
            $cIds[] = $c->id;
        }
        $sizes = Sizes::whereIn('id', $cIds)->get();
        if (Voyager::translatable($sizes)) {
            $sizes = $sizes->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'category' => $checkCategory,
            'sub_category' => $checkSub ?? false,
            'size_filter' => $size,
            'color_filter' => $color,
            'products' => $products,
            'ad' => $ad,
            'filter_colors' => $colors,
            'filter_sizes' => $sizes,
        ];
        return view('category', $toView);
    }
}
