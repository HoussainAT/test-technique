<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\Controller;

class Post extends Model
{
    public $tag;

    use HasFactory;

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    // public function scopePostTagFinder(Builder $query)
    // {
    //     $query->whereHas('tags', function($query) use ($tag) { $query->where('tags.id', $tag);});
    // }
}