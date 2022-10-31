<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontPrivacyController extends Controller
{
    public function index(){
        $page_privacy = Page::select('privacy_title', 'privacy_detail','privacy_status')->first();
        return view('front.privacy', compact('page_privacy'));
    }
}
