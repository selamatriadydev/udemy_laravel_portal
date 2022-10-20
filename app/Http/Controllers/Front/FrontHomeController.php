<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FrontSetting;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\SubCategory;

class FrontHomeController extends Controller
{
    public function index(){
        $home_ad_top = HomeAdvertisement::where('above_ad_position', 'home-top')->where('above_ad_status', 'Show')->first();
        $home_ad_bottom = HomeAdvertisement::where('above_ad_position', 'home-bottom')->where('above_ad_status', 'Show')->first();
        $news_setting  = FrontSetting::where('news_tranding_status', 'Show')->first();
        $news_data = Post::with('rSubCategory')->where('is_publish', 1)->orderBy('id','DESC')->limit(10)->get();
        // $news_sub_category = SubCategory::where('show_on_home', 'Show')->orderBy('sub_category_order', 'asc')->get();
        return view('front.home', compact('home_ad_top', 'home_ad_bottom', 'news_setting', 'news_data'));
    }

}
