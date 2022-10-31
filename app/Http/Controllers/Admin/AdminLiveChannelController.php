<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;
use Illuminate\Http\Request;

class AdminLiveChannelController extends Controller
{
    public function index(){
        $live_channels = LiveChannel::paginate(10);
        return view('admin.live_channel.live_channel_show', compact('live_channels'));
    }
    public function show_active(){
        $live_channels = LiveChannel::where('status', 'Active')->paginate(10);
        return view('admin.live_channel.live_channel_show', compact('live_channels'));
    }

    public function create(){
        return view('admin.live_channel.live_channel_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required',
        ]);
        $status = $request->status == '1' ? 'Active' : 'Non-Active';
        $channel_create = new LiveChannel();
        $channel_create->heading = $request->heading;
        $channel_create->video_id = $request->video_id;
        $channel_create->status = $status;
        $channel_create->save();

        return redirect()->route('admin_live_channel')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $channel_single = LiveChannel::find($id);
        if(!$channel_single){
            return redirect()->route('admin_live_channel')->with('error', 'Data is not found!!');
        }
        return view('admin.live_channel.live_channel_update', compact('channel_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required',
        ]);
        $channel_update = LiveChannel::find($id);
        if(!$channel_update){
            return redirect()->route('admin_live_channel')->with('error', 'Data is not found!!');
        }
        $status = $request->status == '1' ? 'Active' : 'Non-Active';
        $channel_update->heading = $request->heading;
        $channel_update->video_id = $request->video_id;
        $channel_update->status = $status;
        $channel_update->update();

        return redirect()->route('admin_live_channel')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $channel_delete = LiveChannel::find($id);
        if(!$channel_delete){
            return redirect()->route('admin_live_channel')->with('error', 'Data is not found!!');
        }
        $channel_delete->delete();

        return redirect()->route('admin_live_channel')->with('success', 'Data is deleted successfully');
    }
}
