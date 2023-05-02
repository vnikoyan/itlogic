<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Products extends Model
{
    use Translatable;
    protected $translatable = [
        'name',
        'short_description',
        'full_description',
        'features',
    ];

    public static function category_relationship($id){
        return self::where('products.id', '=', $id)
            ->select('products.subcategory', 'categories.id as category')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.subcategory')
            ->join('categories', 'categories.id', '=', 'sub_categories.category')
            ->first();
    }
}
