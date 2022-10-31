<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVideoController extends Controller
{
    public function index(){
        $video_show = Video::orderBy('id', 'asc')->paginate(10);
        return view('admin.video.video_show', compact('video_show'));
    }

    public function create(){
        return view('admin.video.video_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'video_id' => 'required',
            'caption' => 'required',
        ]);
        $is_publish = $request->is_publish == '1' ? '1' : '0';
        $video_create = new Video();
        $video_create->video_id = $request->video_id;
        $video_create->caption = $request->caption;
        $video_create->visitor = 1;
        $video_create->author_id = Auth::guard('web')->user() ? Auth::guard('web')->user()->id : 0;
        $video_create->admin_id = Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : 0;
        $video_create->is_publish = $is_publish;
        $video_create->save();

        return redirect()->route('admin_video')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $video_single = Video::find($id);
        if(!$video_single){
            return redirect()->route('admin_video')->with('error', 'Data is not found!!');
        }
        return view('admin.video.video_update', compact('video_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'video_id' => 'required',
            'caption' => 'required',
        ]);
        $video_update = Video::find($id);
        if(!$video_update){
            return redirect()->route('admin_video')->with('error', 'Data is not found!!');
        }
        $is_publish = $request->is_publish == '1' ? '1' : '0';
        $video_update->video_id = $request->video_id;
        $video_update->is_publish = $is_publish;
        $video_update->update();

        return redirect()->route('admin_video')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $video_delete = Video::find($id);
        if(!$video_delete){
            return redirect()->route('admin_video')->with('error', 'Data is not found!!');
        }
        $video_delete->delete();

        return redirect()->route('admin_video')->with('success', 'Data is deleted successfully');
    }
}
