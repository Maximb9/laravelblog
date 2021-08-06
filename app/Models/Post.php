<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public static function uploadImage(Request $request, $image = null) {

        // проверяем был ли загружен файл. Если у нас пришел файл, то нам нужно его сохранить, нам нужно этот путь получить.
        // в этом случае в $data['thumbnail'] мы запишем этот путь. Мы картинки сортируем по папкам с текущей датой.
        // картинки сортируем по папкам с текущей датой.
        if($request->hasFile('thumbnail')) {
            if($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }

        return null;
    }

    public function getImage() {
        if(!$this->thumbnail) {
            return asset("no-image.png");
        }
        return asset("uploads/{$this->thumbnail}");
    }
}
