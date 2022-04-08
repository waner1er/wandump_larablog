<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function featured_posts()
    {
        return $this->hasMany(Post::class)
            ->where('featured', 1)
            ->take(4);
    }
}
