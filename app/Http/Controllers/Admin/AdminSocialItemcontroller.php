<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialItem;
use Illuminate\Http\Request;

class AdminSocialItemcontroller extends Controller
{
    public function index(){
        $social_items = SocialItem::paginate(10);
        return view('admin.social_item.social_item_show', compact('social_items'));
    }
    public function create(){
        return view('admin.social_item.social_item_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'social_item_icon' => 'required',
            'social_item_url' => 'required',
        ]);
        $social_item_status = $request->social_item_status == 'Show' ? 'Show' : 'Hide';
        $social_item = new SocialItem();
        $social_item->icon = $request->social_item_icon;
        $social_item->url = $request->social_item_url;
        $social_item->status = $social_item_status;
        $social_item->save();

        return redirect()->route('admin_social_item')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $social_item_single = SocialItem::find($id);
        if(!$social_item_single){
            return redirect()->route('admin_social_item')->with('error', 'Data is not found!!');
        }
        return view('admin.social_item.social_item_update', compact('social_item_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'social_item_icon' => 'required',
            'social_item_url' => 'required',
        ]);
        $social_item_update = SocialItem::find($id);
        if(!$social_item_update){
            return redirect()->route('admin_social_item')->with('error', 'Data is not found!!');
        }
        $social_item_status = $request->social_item_status == 'Show' ? 'Show' : 'Hide';
        $social_item_update->icon = $request->social_item_icon;
        $social_item_update->url = $request->social_item_url;
        $social_item_update->status = $social_item_status;
        $social_item_update->update();

        return redirect()->route('admin_social_item')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $social_item = SocialItem::find($id);
        if(!$social_item){
            return redirect()->route('admin_social_item')->with('error', 'Data is not found!!');
        }
        $social_item->delete();

        return redirect()->route('admin_social_item')->with('success', 'Data is deleted successfully');
    }
}
