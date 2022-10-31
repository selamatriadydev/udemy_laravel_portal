<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\websiteMail;

class AdminSubscriberController extends Controller
{
    public function index(){
        $subscriber_data = Subscriber::paginate(10);
        return view('admin.subscribers.subscriber_show', compact('subscriber_data'));
    }

    public function send_email(){
        return view('admin.subscribers.subscriber_send_email');
    }
    public function send_email_submit(Request $request){
        $request->validate([
            'email_subject' => 'required',
            'email_message' => 'required',
        ]);
        // dd($request->all());
        $email_subject = $request->email_subject;
        $email_message = $request->email_message;
        $subscribers = Subscriber::select('email')->distinct()->where('status', 'Active')->get();
        foreach($subscribers as $item){
            Mail::to($item->email)->send( new websiteMail($email_subject, $email_message));
        }
        return redirect()->route('admin_subscriber_send_email')->with('success', 'Email is send successfully');
    }
}
