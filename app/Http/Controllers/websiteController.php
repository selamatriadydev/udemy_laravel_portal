<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Hash;
// use Auth;
use App\Mail\websiteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class websiteController extends Controller 
{
    public function index(){
        return view('multi_user.home'); 
    }

    public function dashboard(){
        return view('multi_user.dashboard');
    }

    public function register(){
        return view('multi_user.register');
    }
    public function register_submit(Request $request){
        // echo $request->name;
        $token = hash('sha256', time());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $token;
        $user->status = "Pending";
        $user->save();

        // $veryfication_link = url('register/verify/'.$token."/".$request->email);
        // $subject = "Register Confirm";
        // $messge = 'Plesase click on thin link: <a href="'.$veryfication_link.'">click here</a>';

        // Mail::to($request->email)->send( new websiteMail($subject, $messge));

        echo  'Email is send';
    }
    public function register_verify($token, $email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
           return redirect()->route('login');
        }
        $user->status = 'Active';
        $user->token  = "";
        $user->update();

        echo  'Register success';
    }

    public function login(){
        return view('multi_user.login');
    }

    public function login_submit(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];

        if( Auth::guard('web')->attempt($credentials) ) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }

    }

    public function forget_password(){
        return view('multi_user.forget_password');
    }
    public function forget_password_submit(Request $request){
        // return view('forget_password');
        // echo $request->email;
        $user = User::where('email', $request->email)->first();
        if(!$user){
            dd('Email not foun');
        }
        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();

        // $veryfication_link = url('reset-password/'.$token."/".$request->email);
        // $subject = "Reset Password";
        // $messge = 'Plesase click on thin link: <a href="'.$veryfication_link.'">click here</a>';

        // Mail::to($request->email)->send( new websiteMail($subject, $messge));

        echo ('check your email');
    }
    public function reset_password($token, $email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
           return redirect()->route('login');
        }
        return view('multi_user.reset_password', compact('token', 'email'));

    }
    public function reset_password_submit(Request $request){
        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        if(!$user){
           return redirect()->route('login');
        }
        $user->token = "";
        $user->password = Hash::make($request->new_password);
        $user->update();

        return redirect()->route('login');

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
