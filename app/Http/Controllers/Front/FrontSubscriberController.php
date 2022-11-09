<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Mail\websiteMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class FrontSubscriberController extends Controller
{
    public function index(Request $request){
        Helpers::read_json();
        // $subscriber = Subscriber::get();
        $validator_message = [
            'email.required' => ERROR_EMAIL_REQUIRED,
            'email.email' => ERROR_EMAIL_VALID
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ],$validator_message);
        if($validator->fails()){
            return response()->json( ['code'=> 0, 'error_message' => $validator->errors()->toArray()] );
        }else{
            $token = hash('sha256', time());
            $subscriber_new = new Subscriber();
            $subscriber_new->email = $request->email;
            $subscriber_new->token = $token;
            $subscriber_new->status = 'Pending';
            $subscriber_new->save();
            // Email is Send
            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);
            $subject = "Subscriber Email Verify";
            $messge = 'Please Click On the following link in order to verify as subscriber <br>';
            $messge .= '<a href="'.$verification_link.'"> Click Here</a>';
            Mail::to($request->email)->send( new websiteMail($subject, $messge));
            return response()->json( ['code'=> 1, 'success_message' => SUCCESS_SUBSCRIBER] );
        }
    }

    public function subscriber_verify($token, $email){
        Helpers::read_json();
        $subscriber = Subscriber::where('token', $token)->where('email', $email)->first();
        if(!$subscriber){
            $error_verify = VERIFY_ERROR_SUBSCRIBER;
            return view('front.subscriber_verify', compact('error_verify'));
        }
        $subscriber->token = "";
        $subscriber->status = "Active";
        $subscriber->update();

        $success_verify = VERIFY_SUCCESS_SUBSCRIBER;
        return view('front.subscriber_verify', compact('success_verify'));
    }
}
