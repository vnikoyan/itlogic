<?php

namespace App\Providers;

use App\Colors;
use App\FormFields\SelectDependentDropdown;
use App\Sizes;
use App\SubCategories;
use App\UserBasket;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Categories;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Facades\Voyager;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $memcached = new \Memcached();
        // $memcached->addServer('127.0.0.1', 11211);
        $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'cli';
        $customerKey = md5('customer_'.$remote_addr);
        // if (!$memcached->get($customerKey)){
            // $memcached->set($customerKey, time());
        // }
        if (!Cookie::has('customer_id') || Cookie::get('customer_id') === 'reload'){
           Cookie::queue(Cookie::make('customer_id', time(), 3600));
            setcookie('customer_id', microtime(), strtotime('+1 month'));
        }
        Voyager::addFormField(SelectDependentDropdown::class);
      //  dd(Session::has('lang_iso'));
        if (session()->has('lang_iso')){
           app()->setLocale(session('lang_iso'));
           dd(Cookie::get('lang_iso'));
        }

        $this->getCategories();
        $this->getColors();
        $this->getSizes();
    }

    /**
     * @author Sargis Ananyan
     * Get categories from database
     *  @return void
     */
    public function getCategories(): void
    {
        View::composer('*', static function($view)
        {
            // $memcached = new \Memcached();
            // $memcached->addServer('127.0.0.1', 11211);
            $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'cli';
            // $customerKey = md5('customer_'.$remote_addr);
            // $basketCount = (int) UserBasket::where('customer_id', $memcached->get($customerKey) ?? 0)->where('active', 1)->count();
            $basketCount = 0;
            $languageIso = App::getLocale();
            $categories = Categories::withTranslation($languageIso)->where('active', '1')->get();
            if (Voyager::translatable($categories)) {
                $categories = $categories->translate($languageIso, getenv('DEF_LANGUAGE'));
            }
            foreach ($categories as $category){
                $subcategories = SubCategories::withTranslation($languageIso)->where('category', $category->id)->where('active', '1')->get();
                if (Voyager::translatable($subcategories)) {
                    $subcategories = $subcategories->translate($languageIso, getenv('DEF_LANGUAGE'));
                }
                $category->subcategories = $subcategories;
            }
            $view->with('basketCount', $basketCount);
            $view->with('categories', $categories);
            $view->with('languageIso', $languageIso);
        });
    }

    /**
     * @author Sargis Ananyan
     * Get colors from database
     *  @return void
     */
    public function getColors(): void
    {
        View::composer('*', static function($view)
        {
            $languageIso = App::getLocale();
            $colors = Colors::withTranslation($languageIso)->get();
            if (Voyager::translatable($colors)) {
                $colors = $colors->translate($languageIso, getenv('DEF_LANGUAGE'));
            }
            $view->with('colors', $colors);
        });
    }

    /**
     * @author Sargis Ananyan
     * Get sizes from database
     *  @return void
     */
    public function getSizes(): void
    {
        View::composer('*', static function($view)
        {
            $languageIso = App::getLocale();
            $sizes = Sizes::withTranslation($languageIso)->get();
            if (Voyager::translatable($sizes)) {
                $sizes = $sizes->translate($languageIso, getenv('DEF_LANGUAGE'));
            }
            $view->with('sizes', $sizes);
        });
    }
}
