<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function rCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function rPost(){
        return $this->hasMany(Post::class, 'sub_category_id')->where('is_publish', 1)->orderBy('id', 'DESC');
    }
    public function rFrontPost(){
        return $this->hasMany(Post::class, 'sub_category_id')->where('is_publish', 1)->orderBy('id', 'DESC');
    }
}
