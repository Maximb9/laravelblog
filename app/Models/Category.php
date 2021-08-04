<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    Use Sluggable;


    public function posts() {

        return $this->hasMany(Post::Class);
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
