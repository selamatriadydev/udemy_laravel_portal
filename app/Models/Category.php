<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function rSubCategory(){
        return $this->hasMany(SubCategory::class, 'category_id')->orderBy('sub_category_order', 'asc');
    }

    public function rLanguage(){
        return $this->belongsTo(Language::class, 'language_id');
    }

}
