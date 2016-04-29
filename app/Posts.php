<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
       'post_title',
       'post_content',
       'description',
       'image',
       'categorie'
    ];
}
