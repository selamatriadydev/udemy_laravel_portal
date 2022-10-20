<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontSetting;
use Illuminate\Http\Request;

class AdminFrontSettingController extends Controller
{
    public function tranding(){
        $front_setting = FrontSetting::first();
        $news_tranding_total = "";
        $news_tranding_status = "";
        if($front_setting){
            $news_tranding_total = $front_setting->news_tranding_total;
            $news_tranding_status = $front_setting->news_tranding_status;
        }
        return view('admin.setting.front.front_setting_show', compact('news_tranding_total','news_tranding_status' ));
    }

    public function tranding_submit(Request $request){
        $request->validate([
            'news_tranding_total' => 'required|numeric|max:20',
        ]);
        $news_tranding_status = $request->news_tranding_status == 'Show' ? 'Show' : 'Hide';
        $front_setting_jml = FrontSetting::first();
        if(!$front_setting_jml){
            $front_setting = new FrontSetting();
            $front_setting->news_tranding_total = $request->news_tranding_total;
            $front_setting->news_tranding_status = $news_tranding_status;
            $front_setting->save();

            return redirect()->route('admin_setting_front_tranding')->with('success', 'Data is created successfully');
        }
        $front_setting = FrontSetting::find($front_setting_jml->id);
        $news_tranding_status = $request->news_tranding_status == 'Show' ? 'Show' : 'Hide';
        $front_setting_jml->news_tranding_total = $request->news_tranding_total;
        $front_setting_jml->news_tranding_status = $news_tranding_status;
        $front_setting_jml->update();

        return redirect()->route('admin_setting_front_tranding')->with('success', 'Data is updated successfully');
    }
}
