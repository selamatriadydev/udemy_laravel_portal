<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class FrontLanguageController extends Controller
{
    public function switch_language(Request $request){
        if($request->short_name !=""){
            $language = Language::where('short_name', $request->short_name)->first();
            if(!$language){
                return redirect()->back()->with('error', 'Language not found!!');
            }
            session()->put('lang_name', $language->name);
            session()->put('lang_short_name', $language->short_name);
            return redirect()->back()->with('success', 'Swicth language successfully');
        }
        return redirect()->back()->with('error', 'Language not found!!');
    }
}
