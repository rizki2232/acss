<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $primaryKey = 'id_posts';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'img',
    ];
}
