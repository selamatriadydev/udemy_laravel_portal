<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class AdminOnlinePollController extends Controller
{
    public function index(){ 
        $online_polls = OnlinePoll::with('rLanguage')->orderby('id','desc')->paginate(10);
        return view('admin.online_poll.online_poll_show', compact('online_polls'));
    }

    public function create(){
        $language_data = Language::get();
        return view('admin.online_poll.online_poll_add', compact('language_data'));
    }

    public function create_submit(Request $request){
        $request->validate([
            'language' => 'required',
            'question' => 'required',
        ]);

        $question_add = new OnlinePoll();
        $question_add->question = $request->question;
        $question_add->yes_vote = 0;
        $question_add->no_vote = 0;
        $question_add->language_id = $request->language;
        $question_add-> save();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is updated successfully');
    }

    public function edit($id){
        $question_single = OnlinePoll::find($id);
        if(!$question_single){
            return redirect()->route('admin_online_poll_show')->with('error', 'Data is not found!!');
        }
        $language_data = Language::get();
        return view('admin.online_poll.online_poll_update', compact('question_single', 'language_data'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'language' => 'required',
            'question' => 'required',
        ]);
        $question_update = OnlinePoll::find($id);
        if(!$question_update){
            return redirect()->route('admin_online_poll_show')->with('error', 'Data is not found!!');
        }
        $question_update->question = $request->question;
        $question_update->language_id = $request->language;
        $question_update->update();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $question_delete = OnlinePoll::find($id);
        if(!$question_delete){
            return redirect()->route('admin_online_poll_show')->with('error', 'Data is not found!!');
        }
        $question_delete->delete();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is deleted successfully');
    }
}
