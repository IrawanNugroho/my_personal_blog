<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'description', 'credit', 'image', 'thumbnail', 'status_id', 'created_by', 'updated_by'];
}
