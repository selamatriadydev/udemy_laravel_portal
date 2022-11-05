<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function rSubCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function rAuthor(){
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function rAdmin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function rTag(){
        return $this->hasMany(Tag::class, 'post_id');
    }
}
