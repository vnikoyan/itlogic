<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{
    use Translatable;
    protected $translatable = ['title', 'short_text', 'full_text'];
}
