<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
    public function index(){
        Helpers::read_json();
        $page_about = Page::select('about_title', 'about_detail','about_status')->where('language_id', CURRENT_LANG_ID)->first();
        return view('front.about', compact('page_about'));
    }
}
