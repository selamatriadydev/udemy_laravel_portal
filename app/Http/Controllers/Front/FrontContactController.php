<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Mail\websiteMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontContactController extends Controller 
{
    public function index(){
        $page_contact = Page::select('contact_title', 'contact_detail','contact_map','contact_status')->first();
        return view('front.contact', compact('page_contact'));
    }

    public function send_email(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if($validator->fails()){
            return response()->json( ['code'=> 0, 'error_message' => $validator->errors()->toArray()] );
        }else{
            // Email is Send
            $admin = Admin::where('id', 1)->first();

            $subject = "Contact Form Email";
            $messge = 'Visitor Message Detail : ';
            $messge .= '<br><b>Visitor Name</b> : '.$request->name;
            $messge .= '<br><b>Visitor Email</b> : '.$request->email;
            $messge .= '<br><b>Visitor Message</b> : '.$request->message;
            Mail::to($admin->email)->send( new websiteMail($subject, $messge));


            return response()->json( ['code'=> 1, 'success_message' => 'Email is Send!'] );
        }
    }
}
