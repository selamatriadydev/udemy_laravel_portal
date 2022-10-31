<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontFaqController extends Controller
{
    public function index(){
        $page_faq = Page::select('faq_title', 'faq_detail','faq_status')->first();
        $faq_data = Faq::where('faq_status', 'Show')->get();
        return view('front.faq', compact('page_faq', 'faq_data'));
    }
}
