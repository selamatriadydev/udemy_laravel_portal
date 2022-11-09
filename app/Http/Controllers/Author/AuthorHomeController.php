<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AuthorHomeController extends Controller
{
    public function index(){
        $total_news = Post::where('author_id', Auth::guard('author')->user()->id)->count();
        $total_news_publish = Post::where('is_publish', 1)->where('author_id', Auth::guard('author')->user()->id)->count();
        $total_news_draft = Post::where('is_publish', 0)->where('author_id', Auth::guard('author')->user()->id)->count();
        return view('author.home', compact('total_news','total_news_publish','total_news_draft'));
    }
}
