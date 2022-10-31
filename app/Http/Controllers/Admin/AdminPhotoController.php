<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class AdminPhotoController extends Controller
{
    public function index(){
        $photo = Photo::orderBy('id', 'asc')->paginate(10);
        return view('admin.photo.photo_show', compact('photo'));
    }

    public function create(){
        return view('admin.photo.photo_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'caption' => 'required',
        ]);
        $is_publish = $request->is_publish == '1' ? '1' : '0';
        $photo = new Photo();
        if($request->hasFile('photo')){
            $ext = $request->file('photo')->extension();
            $now = time();
            $final_name = 'galery-photo-'.$now.'.'.$ext;
            $date = date('Y');
            $path = 'upload/galery/photo/'.$date."/";
            $request->file('photo')->move(public_path($path),$final_name);
            $file_final_name = $date."/".$final_name;
        }
        $photo->photo = $file_final_name;
        $photo->caption = $request->caption;
        $photo->visitor = 1;
        $photo->author_id = Auth::guard('web')->user() ? Auth::guard('web')->user()->id : 0;
        $photo->admin_id = Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : 0;
        $photo->is_publish = $is_publish;
        $photo->save();

        return redirect()->route('admin_photo')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $photo_single = Photo::find($id);
        if(!$photo_single){
            return redirect()->route('admin_photo')->with('error', 'Data is not found!!');
        }
        return view('admin.photo.photo_update', compact('photo_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'caption' => 'required',
        ]);
        $photo = Photo::find($id);
        if(!$photo){
            return redirect()->route('admin_photo')->with('error', 'Data is not found!!');
        }
        $is_publish = $request->is_publish == '1' ? '1' : '0';
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/galery/photo/'.$photo->photo))){
                File::deleteDirectory('upload/galery/photo/'.$photo->photo);
            }

            $ext = $request->file('photo')->extension();
            $now = time();
            $final_name = 'galery-photo-'.$now.'.'.$ext;
            $date = date('Y');
            $path = 'upload/galery/photo/'.$date."/";
            $request->file('photo')->move(public_path($path),$final_name);
            $file_final_name = $date."/".$final_name;
            $photo->photo = $file_final_name;
        }
        $photo->caption = $request->caption;
        $photo->is_publish = $is_publish;
        $photo->update();

        return redirect()->route('admin_photo')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $photo = Photo::find($id);
        if(!$photo){
            return redirect()->route('admin_photo')->with('error', 'Data is not found!!');
        }
        if(file_exists(public_path('upload/galery/photo/'.$photo->photo))){
            File::deleteDirectory('upload/galery/photo/'.$photo->photo);
        }
        $photo->delete();

        return redirect()->route('admin_photo')->with('success', 'Data is deleted successfully');
    }
}
