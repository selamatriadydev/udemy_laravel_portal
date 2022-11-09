<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
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
        Helpers::read_json();
        $page_contact = Page::select('contact_title', 'contact_detail','contact_map','contact_status')->where('language_id', CURRENT_LANG_ID)->first();
        return view('front.contact', compact('page_contact'));
    }

    public function send_email(Request $request){
        Helpers::read_json();
        $validator_message = [
            'name.required' => ERROR_NAME_REQUIRED,
            'email.required' => ERROR_EMAIL_REQUIRED,
            'email.email' => ERROR_EMAIL_VALID,
            'message.required' => ERROR_MESSAGE_REQUIRED
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], $validator_message );
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


            return response()->json( ['code'=> 1, 'success_message' => SUCCESS_CONTACT] );
        }
    }
}
