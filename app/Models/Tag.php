<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag_name',
    ];

    public function rFrontPost(){
        return $this->hasMany(Post::class,'id', 'post_id')->where('is_publish', 1)->orderBy('id', 'DESC');
    }
}
