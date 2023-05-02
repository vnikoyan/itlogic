<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{id}', 'ProductController@index')->name('product');
Route::get('/category/{id}/{sub}', 'CategoryController@index')->name('category');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@view')->name('news.view');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::get('/gallery/{id}', 'GalleryController@view')->name('gallery.view');
Route::get('/payments', 'PaymentsController@index')->name('payments');
Route::get('/about-us', 'AboutusController@index')->name('about_us');
Route::get('/our=partners', 'PartnersController@index')->name('partners');
Route::get('/basket', 'BasketController@index')->name('basket');
Route::any('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::any('/basket/checkout/done', 'BasketController@done')->name('basket.checkout.done');
Route::any('/basket/update', 'BasketController@update')->name('basket.update');
Route::any('/basket/remove', 'BasketController@remove')->name('basket.update');
Route::any('/converter/money', 'ConverterController@money')->name('converter.money');
Route::any('/test', 'TestController@index')->name('basket.test');
Route::post('/search/product', 'ProductsController@searchProduct')->name('search.product');
Route::get('/search-result/product', 'ProductsController@searchResultProduct')->name('searchResult.product');
/*
Route::get('/home', 'HomeController@index')->name('home');
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/language/{iso}', 'LanguageController@index')->name('language');
Auth::routes();
