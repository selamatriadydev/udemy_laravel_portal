<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;

class FrontHomeController extends Controller
{
    public function index(){
        $home_ad_top = HomeAdvertisement::where('above_ad_position', 'home-top')->where('above_ad_status', 'Show')->first();
        $home_ad_bottom = HomeAdvertisement::where('above_ad_position', 'home-bottom')->where('above_ad_status', 'Show')->first();
        return view('front.home', compact('home_ad_top', 'home_ad_bottom'));
    }

    public function category_view(){
        return view('front.category_detail');
    }

    public function post_detail(){
        return view('front.post_detail');
    }

}
