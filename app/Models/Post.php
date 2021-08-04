<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    Use Sluggable;


    public function tags() {

        return $this->belongsToMany(Tag::Class);
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
