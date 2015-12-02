<?php

namespace Kylestev;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['created_at', 'updated_at', 'published_at'];
}
