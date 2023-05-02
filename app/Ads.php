<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Ads extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];
}
