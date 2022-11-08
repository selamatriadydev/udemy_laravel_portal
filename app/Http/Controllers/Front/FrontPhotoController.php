<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class FrontPhotoController extends Controller
{
    public function index(){
        Helpers::read_json();
        $photo_galery = Photo::where('is_publish', 1)->paginate(10);
        return view('front.photo_galery', compact('photo_galery'));
    }
}
