<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class SubCategories extends Model
{
    use Translatable;
    protected $translatable = ['name'];
}
