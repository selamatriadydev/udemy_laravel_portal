<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontDisclaimerController extends Controller
{
    public function index(){
        $page_disclaimer = Page::select('disclaimer_title', 'disclaimer_detail','disclaimer_status')->first();
        return view('front.disclaimer', compact('page_disclaimer'));
    }
}
