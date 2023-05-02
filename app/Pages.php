<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Pages extends Model
{
    use Translatable;
    protected $translatable = ['name', 'text'];
}
