<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontSetting;
use Illuminate\Http\Request;
use File;

class AdminFrontSettingController extends Controller
{
    public function setting(){ 
        $front_setting = FrontSetting::orderBy('id', 'asc')->first();
        return view('admin.setting.front.front_setting_show', compact('front_setting'));
    }

    public function setting_submit(Request $request){
        if($request->news_tranding_total !=""){
            $request->validate([
                'news_tranding_total' => 'required|numeric|max:20',
            ]);
        }
        if($request->top_bar_email !=""){
            $request->validate([
                'top_bar_email' => 'required|email',
            ]);
        }
        if($request->news_video_total !=""){
            $request->validate([
                'news_video_total' => 'required|numeric|max:20',
            ]);
        }
        
        $logo_final_name = ""; 
        if($request->hasFile('setting_logo')){
            $request->validate([
                'setting_logo' => 'image|mimes:png,jpg,gif',
            ]);
            $ext = $request->file('setting_logo')->extension();
            $time = time();
            $logo_final_name = 'settng-logo-'.$time.'.'.$ext;
            $request->file('setting_logo')->move('upload/setting/front',$logo_final_name);
        }
        $favicon_final_name = "";
        if($request->hasFile('setting_favicon')){
            $request->validate([
                'setting_favicon' => 'image|mimes:png,jpg,gif',
            ]);

            $ext = $request->file('setting_favicon')->extension();
            $time = time();
            $favicon_final_name = 'settng-favicon-'.$time.'.'.$ext;
            $request->file('setting_favicon')->move('upload/setting/front',$favicon_final_name);
        }

        $front_setting_jml = FrontSetting::orderBy('id', 'asc')->first();

        if(!$front_setting_jml){
            $front_setting = new FrontSetting();
            $front_setting->news_tranding_total = $request->news_tranding_total ? $request->news_tranding_total : 0;
            $front_setting->news_tranding_status = $request->news_tranding_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->video_total = $request->news_video_total ? $request->news_video_total : 0;
            $front_setting->video_status = $request->news_video_status == 'Show' ? 'Show' : 'Hide';
            if($request->hasFile('setting_logo')){
                $front_setting->logo = $logo_final_name;
            }else{
                $front_setting->logo = "";
            }
            if($request->hasFile('setting_favicon')){
                $front_setting->favicon = $favicon_final_name;
            }else{
                $front_setting->favicon = "";
            }
            $front_setting->top_bar_date_status = $request->top_bar_date_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->top_bar_email = $request->top_bar_email ? $request->top_bar_email  : '';
            $front_setting->top_bar_email_status = $request->top_bar_email_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->theme_color_1 = $request->theme_color_1 ? $request->theme_color_1  : '';
            $front_setting->theme_color_2 = $request->theme_color_2 ? $request->theme_color_2  : '';
            $front_setting->analytic_id = $request->analytic_id ? $request->analytic_id  : '';
            $front_setting->analytic_id_status = $request->analytic_id_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->disqus_code = $request->disqus_code ? $request->disqus_code  : '';
            $front_setting->disqus_status = $request->disqus_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->save();
        }else{
            $front_setting = FrontSetting::find($front_setting_jml->id);

            $news_tranding_status = $request->news_tranding_status == 'Show' ? 'Show' : 'Hide';
            $front_setting_jml->news_tranding_total = $request->news_tranding_total;
            $front_setting_jml->news_tranding_status = $news_tranding_status;
            $front_setting->video_total = $request->news_video_total ? $request->news_video_total : 0;
            $front_setting->video_status = $request->news_video_status == 'Show' ? 'Show' : 'Hide';
            if($request->hasFile('setting_logo')){
                if(file_exists(public_path('upload/setting/front/'.$front_setting->logo))){
                    File::deleteDirectory('upload/setting/front/'.$front_setting->logo);
                }
                $front_setting->logo = $logo_final_name;
            }
            if($request->hasFile('setting_favicon')){
                if(file_exists(public_path('upload/setting/front/'.$front_setting->favicon))){
                    File::deleteDirectory('upload/setting/front/'.$front_setting->favicon);
                }
                $front_setting->favicon = $favicon_final_name;
            }
            $front_setting->top_bar_date_status = $request->top_bar_date_status == 'Show' ? 'Show' : 'Hide';
            if($request->top_bar_email !=""){
                $front_setting->top_bar_email = $request->top_bar_email;
            }
            $front_setting->top_bar_email_status = $request->top_bar_email_status == 'Show' ? 'Show' : 'Hide';
            if($request->theme_color_1 !=""){
                $front_setting->theme_color_1 = $request->theme_color_1;
            }
            if($request->theme_color_2 !=""){
                $front_setting->theme_color_2 = $request->theme_color_2;
            }
            if($request->analytic_id !=""){
                $front_setting->analytic_id = $request->analytic_id;
            }
            $front_setting->analytic_id_status = $request->analytic_id_status == 'Show' ? 'Show' : 'Hide';
            if($request->disqus_code !=""){
                $front_setting->disqus_code = $request->disqus_code;
            }
            $front_setting->disqus_status = $request->disqus_status == 'Show' ? 'Show' : 'Hide';
            $front_setting->update();
        }

        return redirect()->route('admin_setting_front')->with('success', 'Data is updated successfully');
    }
}
