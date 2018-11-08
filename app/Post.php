<?php

namespace App;

use App\PostCategory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'featured_image', 'status', 'author_id'];

    
}
