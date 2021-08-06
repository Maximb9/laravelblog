<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    Use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function tags() {

        return $this->belongsToMany(Tag::Class)->withTimestamps();
    }


    public function category() {
        return $this->belongsTo(Category::Class);
    }


    // источник title
    public function sluggable () {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
