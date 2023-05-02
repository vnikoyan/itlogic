<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Colors;
use App\ProductPrices;
use App\Products;
use App\Sizes;
use App\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller
{
    public function index($id){
        $languageIso = App::getLocale();
        $product = Products::where('id', $id)->first();
        if (!isset($product->id)){
            abort(404);
        }
        if (Voyager::translatable($product)) {
            $product = $product->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $category = Categories::where('id', $product->category)->first();
        if (Voyager::translatable($category)) {
            $category = $category->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $subcategory = SubCategories::where('id', $product->subcategory)->first();
        if (Voyager::translatable($subcategory)) {
            $subcategory = $subcategory->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $firstPrice = ProductPrices::where('product', $product->id)->orderBy('price', 'ASC')->first();
        if(!is_null($firstPrice)){
            $colorName = Colors::where('id', $firstPrice->color)->first();
            $sizeName = Sizes::where('id', $firstPrice->size)->first();
        }
        if (Voyager::translatable($colorName)) {
            $colorName  = $colorName->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $firstPrice->colorName  = $colorName->name;
        // if (Voyager::translatable($sizeName)) {
        //     $sizeName  = $sizeName->translate($languageIso, getenv('DEF_LANGUAGE'));
        // }
        $firstPrice->sizeName = $sizeName->name;
        $prices = ProductPrices::where('product', $product->id)->where('id', '!=', $firstPrice->id)->get();
       foreach ($prices as $price){
           $colorName = Colors::where('id', $price->color)->first();
           $sizeName = Sizes::where('id', $price->size)->first();
           if (Voyager::translatable($colorName)) {
               $colorName  = $colorName->translate($languageIso, getenv('DEF_LANGUAGE'));
           }
           $price->colorName  = $colorName->name;
        //    if (Voyager::translatable($sizeName)) {
        //        $sizeName  = $sizeName->translate($languageIso, getenv('DEF_LANGUAGE'));
        //    }
           $price->sizeName = $sizeName->name;
       }
       Products::where('id', '=', $product->id)->update(['views' => (int) $product->views +1 ]);
       $ProductImages = ProductPrices::where('product', $product->id)->orderBy('price', 'ASC')->get();
       $toView = [
           'product' => $product,
           'category' => $category,
           'subcategory' => $subcategory,
           'firstPrice' => $firstPrice,
           'prices' => $prices,
           'id' => $id,
        ];
        foreach($ProductImages as $val){
         if(!empty(json_decode($val->photos))){
            $toView['color_images_'.$val->color] = $val->photos;
         }
     }
        return view('products.view', $toView);
    }
}
