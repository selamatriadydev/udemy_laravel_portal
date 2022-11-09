<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontDisclaimerController extends Controller
{
    public function index(){
        Helpers::read_json();
        $page_disclaimer = Page::select('disclaimer_title', 'disclaimer_detail','disclaimer_status')->where('language_id', CURRENT_LANG_ID)->first();
        return view('front.disclaimer', compact('page_disclaimer'));
    }
}
