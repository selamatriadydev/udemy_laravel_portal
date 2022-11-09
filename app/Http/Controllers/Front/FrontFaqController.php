<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontFaqController extends Controller
{
    public function index(){
        Helpers::read_json();
        $page_faq = Page::select('faq_title', 'faq_detail','faq_status')->where('language_id', CURRENT_LANG_ID)->first();
        $faq_data = Faq::where('faq_status', 'Show')->where('language_id', CURRENT_LANG_ID)->get();
        return view('front.faq', compact('page_faq', 'faq_data'));
    }
}
