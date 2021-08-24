<?php

namespace App\Models;

use App\Models\Tag;

use App\Console\Commands\PostTagFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    public $tag;

    use HasFactory;

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeTagFinder($query,int $tag)
    {
        return $query->whereHas('tags', function ($query) use ($tag) {
        $query->where('tags.id', $tag);});
    }
}


// public function scopePostTagFinder(Builder $query)
// {
//     $query->whereHas('tags', function($query) use ($tag) { $query->where('tags.id', $tag);});
// }