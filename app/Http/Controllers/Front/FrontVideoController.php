<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontVideoController extends Controller
{
    public function index(){
        $video_galery = Video::where('is_publish', 1)->paginate(10);
        return view('front.video_galery', compact('video_galery'));
    }
}
