<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request; 
use File;
use Illuminate\Support\Facades\Route;

class AdminAdvertisementController extends Controller
{
    public function index(){
        $data_ad = HomeAdvertisement::paginate(5);
        return view('admin.advertisement.home', compact('data_ad'));
    }
    public function home_ad_show_top(){
        $home_ad_data_top = HomeAdvertisement::where('above_ad_position', 'home-top')->first();
        return view('admin.advertisement.home', compact('home_ad_data_top'));
    }
    public function home_ad_top_update(Request $request){
        $home_ad_data_top = HomeAdvertisement::where('above_ad_position', 'home-top')->first();
        // dd($home_ad_data_top);
        $status_ad = $request->above_ad_status_top == 1 ? 'Show' : 'Hide';
        
        if(!$home_ad_data_top){
            $request->validate([
                'above_ad_top' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);
            if($request->hasFile('above_ad_top')){
                $ext = $request->file('above_ad_top')->extension();
                $final_name = 'advertisement-home-top.'.$ext;
                $request->file('above_ad_top')->move('upload/advertisement/',$final_name);
            }
            $new_adver = new HomeAdvertisement();
            $new_adver->above_ad = $final_name;
            $new_adver->above_ad_url = $request->above_ad_url_top;
            $new_adver->above_ad_status = $status_ad;
            $new_adver->above_ad_position = "home-top";
            $new_adver->save();

            return redirect()->route('admin_home_ad')->with('success', 'Data is created successfully');
        }
        if($request->hasFile('above_ad_top')){

            $request->validate([
                'above_ad_top' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/advertisement/'.$home_ad_data_top->above_ad))){
                File::deleteDirectory('upload/advertisement/'.$home_ad_data_top->above_ad);
            }

            $ext = $request->file('above_ad_top')->extension();
            $final_name = 'advertisement-home-top.'.$ext;
            $request->file('above_ad_top')->move('upload/advertisement/',$final_name);
            $home_ad_data_top->above_ad = $final_name;
        }
        $home_ad_data_top->above_ad_url = $request->above_ad_url_top;
        $home_ad_data_top->above_ad_status = $status_ad;
        $home_ad_data_top->update();

        return redirect()->route('admin_home_ad')->with('success', 'Data is updated successfully');
    }

    public function home_ad_show_bottom(){
        $home_ad_data_bottom = HomeAdvertisement::where('above_ad_position', 'home-bottom')->first();
        return view('admin.advertisement.home', compact('home_ad_data_bottom'));
    }

    public function home_ad_bottom_update(Request $request){
        $home_ad_data_bottom = HomeAdvertisement::where('above_ad_position', 'home-bottom')->first();
        // dd($home_ad_data_bottom);
        $status_ad = $request->above_ad_status_bottom == 1 ? 'Show' : 'Hide';
        
        if(!$home_ad_data_bottom){
            $request->validate([
                'above_ad_bottom' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);
            if($request->hasFile('above_ad_bottom')){
                $ext = $request->file('above_ad_bottom')->extension();
                $final_name = 'advertisement-home-bottom.'.$ext;
                $request->file('above_ad_bottom')->move('upload/advertisement/',$final_name);
            }
            $new_adver = new HomeAdvertisement();
            $new_adver->above_ad = $final_name;
            $new_adver->above_ad_url = $request->above_ad_url_top;
            $new_adver->above_ad_status = $status_ad;
            $new_adver->above_ad_position = "home-bottom";
            $new_adver->save();

            return redirect()->route('admin_home_ad_bottom')->with('success', 'Data is created successfully');
        }
        if($request->hasFile('above_ad_bottom')){

            $request->validate([
                'above_ad_bottom' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/advertisement/'.$home_ad_data_bottom->above_ad))){
                File::deleteDirectory('upload/advertisement/'.$home_ad_data_bottom->above_ad);
            }

            $ext = $request->file('above_ad_bottom')->extension();
            $final_name = 'advertisement-home-bottom.'.$ext;
            $request->file('above_ad_bottom')->move('upload/advertisement/',$final_name);
            $home_ad_data_bottom->above_ad = $final_name;
        }
        $home_ad_data_bottom->above_ad_url = $request->above_ad_url_bottom;
        $home_ad_data_bottom->above_ad_status = $status_ad;
        $home_ad_data_bottom->update();

        return redirect()->route('admin_home_ad_bottom')->with('success', 'Data is updated successfully');
        
    }

    public function home_ad_show_header(){
        $home_ad_data_header = HomeAdvertisement::where('above_ad_position', 'header')->first();
        return view('admin.advertisement.home', compact('home_ad_data_header'));
    }
    public function home_ad_header_update(Request $request){
        $home_ad_data_header = HomeAdvertisement::where('above_ad_position', 'header')->first();
        // dd($home_ad_data_bottom);
        $status_ad = $request->above_ad_status_header == 1 ? 'Show' : 'Hide';
        
        if(!$home_ad_data_header){
            $request->validate([
                'above_ad_header' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);
            if($request->hasFile('above_ad_header')){
                $ext = $request->file('above_ad_header')->extension();
                $final_name = 'advertisement-header.'.$ext;
                $request->file('above_ad_header')->move('upload/advertisement/',$final_name);
            }
            $new_adver = new HomeAdvertisement();
            $new_adver->above_ad = $final_name;
            $new_adver->above_ad_url = $request->above_ad_url_top;
            $new_adver->above_ad_status = $status_ad;
            $new_adver->above_ad_position = "header";
            $new_adver->save();

            return redirect()->route('admin_home_ad_header')->with('success', 'Data is created successfully');
        }
        if($request->hasFile('above_ad_header')){

            $request->validate([
                'above_ad_header' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/advertisement/'.$home_ad_data_header->above_ad))){
                File::deleteDirectory('upload/advertisement/'.$home_ad_data_header->above_ad);
            }

            $ext = $request->file('above_ad_header')->extension();
            $final_name = 'advertisement-header.'.$ext;
            $request->file('above_ad_header')->move('upload/advertisement/',$final_name);
            $home_ad_data_header->above_ad = $final_name;
        }
        $home_ad_data_header->above_ad_url = $request->above_ad_url_header;
        $home_ad_data_header->above_ad_status = $status_ad;
        $home_ad_data_header->update();

        return redirect()->route('admin_home_ad_header')->with('success', 'Data is updated successfully');
        
    }


    public function home_ad_show_sidebar(){
        $home_ad_data_sidebar = HomeAdvertisement::where('above_ad_position', 'sidebar')->first();
        return view('admin.advertisement.home', compact('home_ad_data_sidebar'));
    }
    public function home_ad_sidebar_update(Request $request){
        $home_ad_data_sidebar = HomeAdvertisement::where('above_ad_position', 'sidebar')->first();
        // dd($home_ad_data_bottom);
        $status_ad = $request->above_ad_status_sidebar == 1 ? 'Show' : 'Hide';
        
        if(!$home_ad_data_sidebar){
            $request->validate([
                'above_ad_sidebar' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);
            if($request->hasFile('above_ad_sidebar')){
                $ext = $request->file('above_ad_sidebar')->extension();
                $final_name = 'advertisement-sidebar.'.$ext;
                $request->file('above_ad_sidebar')->move('upload/advertisement/',$final_name);
            }
            $new_adver = new HomeAdvertisement();
            $new_adver->above_ad = $final_name;
            $new_adver->above_ad_url = $request->above_ad_url_top;
            $new_adver->above_ad_status = $status_ad;
            $new_adver->above_ad_position = "sidebar";
            $new_adver->save();

            return redirect()->route('admin_home_ad_sidebar')->with('success', 'Data is created successfully');
        }
        if($request->hasFile('above_ad_sidebar')){

            $request->validate([
                'above_ad_sidebar' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/advertisement/'.$home_ad_data_sidebar->above_ad))){
                File::deleteDirectory('upload/advertisement/'.$home_ad_data_sidebar->above_ad);
            }

            $ext = $request->file('above_ad_sidebar')->extension();
            $final_name = 'advertisementsidebar.'.$ext;
            $request->file('above_ad_sidebar')->move('upload/advertisement/',$final_name);
            $home_ad_data_sidebar->above_ad = $final_name;
        }
        $home_ad_data_sidebar->above_ad_url = $request->above_ad_url_sidebar;
        $home_ad_data_sidebar->above_ad_status = $status_ad;
        $home_ad_data_sidebar->update();

        return redirect()->route('admin_home_ad_sidebar')->with('success', 'Data is updated successfully');
        
    }

    

}
