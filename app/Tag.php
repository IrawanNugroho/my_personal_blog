<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function comments()
    {
        return $this->hasMany('App\ArticleTagDetail');
    }
}
