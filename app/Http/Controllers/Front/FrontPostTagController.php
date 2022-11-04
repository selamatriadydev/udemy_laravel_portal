<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontPostTagController extends Controller
{
    public function index($tag_name){
        $tag = Tag::where('tag_name', $tag_name)->first();
        $tagName = $tag_name;
        if($tag){
            $tagName = $tag->tag_name;
        }
        $news_tag = Post::with('rSubCategory')
        ->whereHas('rTag', function($q) use ($tagName){
            $q->where('tag_name', $tagName);
        })
        ->where('is_publish', 1)->orderBy('id', 'DESC')->paginate(10);
        // if($news_tag){
        // dd($news_tag);
        // }
        return view('front.tag', compact('news_tag', 'tagName'));
    }
}
