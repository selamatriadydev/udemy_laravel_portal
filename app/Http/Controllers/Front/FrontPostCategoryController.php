<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request; 

class FrontPostCategoryController extends Controller
{
    public function index(){
        $news_category = SubCategory::with(
            ['rFrontPost' => function($q){
                $q->limit(5);
            }]
        )->where('show_on_home', 'Show')->orderBy('sub_category_order','ASC')->get();
        return view('front.category', compact('news_category'));
    }

    public function detail($id){
        $sub_category = SubCategory::find($id);
        $news_category = Post::with('rSubCategory')->where('sub_category_id', $id)->orderBy('id','DESC')->paginate(10);
        return view('front.category_detail', compact('news_category', 'sub_category'));
    }
}