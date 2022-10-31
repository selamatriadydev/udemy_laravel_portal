<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontTermsController extends Controller
{
    public function index(){
        $page_terms = Page::select('terms_title', 'terms_detail','terms_status')->first();
        return view('front.terms', compact('page_terms'));
    }
}
