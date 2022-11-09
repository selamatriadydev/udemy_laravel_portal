<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function rAuthor(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function rAdmin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function rLanguage(){
        return $this->belongsTo(Language::class, 'language_id');
    }
}
