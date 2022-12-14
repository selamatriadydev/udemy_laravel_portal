<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    public function detail($id){
        Helpers::read_json();
        $news_detail = Post::with('rSubCategory', 'rTag')->find($id);

        $news_tag = "";
        $news_author = "";
        $news_related = "";
        if($news_detail){
            //update visitor
            $news_detail->visitor = $news_detail->visitor+1;
            $news_detail->update();
            if($news_detail->rAuthor){
                $news_author = $news_detail->rAuthor;
            }elseif($news_detail->rAdmin){
                $news_author = $news_detail->rAdmin;
            }
            if($news_detail->rTag){
                $news_tag = $news_detail->rTag;
            }
            //related news
            $news_related = Post::with('rSubCategory', 'rTag')->where('sub_category_id', $news_detail->sub_category_id)->orderBy('id', 'desc')->get();
            // dd($news_related);
        }

        return view('front.post_detail', compact('news_detail','news_related', 'news_author', 'news_tag'));
    }
}
