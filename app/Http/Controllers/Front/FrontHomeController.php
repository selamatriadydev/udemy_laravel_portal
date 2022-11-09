<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FrontSetting;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Video;

class FrontHomeController extends Controller
{
    public function index(){
        Helpers::read_json();

        $home_ad_top = HomeAdvertisement::where('above_ad_position', 'home-top')->where('above_ad_status', 'Show')->first();
        $home_ad_bottom = HomeAdvertisement::where('above_ad_position', 'home-bottom')->where('above_ad_status', 'Show')->first();
        $news_setting  = FrontSetting::where('news_tranding_status', 'Show')->first();
        //post
        $news_data = Post::with('rSubCategory')->where('is_publish', 1)->where('language_id', CURRENT_LANG_ID)->orderBy('id','DESC')->limit(10)->get();
        $featured_news_data = Post::with('rSubCategory')->where('is_publish', 1)->where('language_id', CURRENT_LANG_ID)->orderBy('visitor', 'DESC')->limit(20)->get();
        $news_data_all = Post::with('rSubCategory', 'rAuthor', 'rAdmin')->where('language_id', CURRENT_LANG_ID)->where('is_publish', 1)->orderBy('id','DESC')->paginate(10);
        //search
        $search_category_data = Category::with('rSubCategory')->where('language_id', CURRENT_LANG_ID)->get();
        //video 
        $setting_video = FrontSetting::orderBy('id', 'asc')->first();
        $video_data = Video::where('is_publish', 1)->where('language_id', CURRENT_LANG_ID)->orderBy('id','desc')->get();
        // dd($video_data);
        // dd($search_subCategory_data);
        return view('front.home', compact('home_ad_top', 'home_ad_bottom', 'news_setting', 'news_data','news_data_all', 'featured_news_data', 'search_category_data','video_data','setting_video'));
    }

    public function search(Request $request){
        Helpers::read_json();
        $search_item = $request->search_item;
        $search_category = $request->search_category;
        $search_sub_category = $request->search_sub_category;
        //get category name
        $search_category_name = "";
        if($search_category !=""){
            $category = Category::where('id', $search_category)->first();
            if($category){
                $search_category_name = $category->category_name;
            }
        }
        //get sub category name
        $search_sub_category_name = "";
        if($search_sub_category !=""){
            $sub_category = SubCategory::where('id', $search_sub_category)->first();
            if($sub_category){
                $search_sub_category_name = $sub_category->sub_category_name;
            }
        }

        $news_search_data = Post::with('rSubCategory.rCategory')
            ->when($search_item, function ($q) use ($search_item){
                $q->where('post_title', 'LIKE', "%$search_item%")->orWhere('post_detail', 'LIKE', "%$search_item%");
            })
            ->when($search_category, function ($q) use ($search_category){
                $q->whereHas('rSubCategory', function($q2) use ($search_category){
                    $q2->where('category_id', $search_category);
                });
            })
            ->when($search_sub_category, function ($q) use ($search_sub_category){
                $q->where('sub_category_id', $search_sub_category);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        // dd($news_search_data);
        return view('front.search_result', compact('news_search_data', 'search_category_name', 'search_sub_category_name'));
    }

}
