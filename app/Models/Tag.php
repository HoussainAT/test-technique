<?php

namespace App\Models;

use App\Models\Post;
use App\Console\Commands\PostTagFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    public $tag;
    
    protected $guarded = [];

    public function posts() 
    {
        return $this->belongsToMany(Post::class);
    }
}

// public function scopeTagfinder($query, PostTagFinder $tag)
    // {
    //     return $query->whereHas('tags', function($query) use ($tag) { $query->where('tags.id', $tag);})->get()->pluck('title');
    // }


//     public function scopeFinder (Builder $query)
//     {
//         $query->where 
//     }
// }