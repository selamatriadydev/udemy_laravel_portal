<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontArchiveController extends Controller
{
    public function index(Request $request){
        Helpers::read_json();
        $validator = Validator::make($request->all(), [
            'archive_news' => 'required',
        ]);
        if($validator->fails()){
            $temp_month = "0";
            $temp_year = "0";
        }else{
            $archive_news = $request->archive_news;
            $temp = explode("-", $archive_news);
            if(is_array($temp)){
                $temp_month = $temp[0];
                $temp_year = $temp[1];
            }else{
                $temp_month = "0";
                $temp_year = "0";
            }
        }
        return redirect()->route('archive_detail', [$temp_year, $temp_month]);
    }

    public function detail($year, $month){
        Helpers::read_json();
        if($year && $month){
        $archive_news_data = Post::with('rSubCategory')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->paginate();
        $archive_data      = Post::with('rSubCategory')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->first();
        }else{
            $archive_data ="";
            $archive_news_data ="";
        }
        // dd($archive_news_data);
        return view('front.archive_show', compact('archive_news_data','archive_data'));
    }
}
