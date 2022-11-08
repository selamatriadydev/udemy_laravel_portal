<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontVideoController extends Controller
{
    public function index(){
        Helpers::read_json();
        $video_galery = Video::where('is_publish', 1)->paginate(10);
        return view('front.video_galery', compact('video_galery'));
    }
}
