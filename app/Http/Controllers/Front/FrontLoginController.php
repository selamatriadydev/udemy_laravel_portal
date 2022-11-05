<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\websiteMail;

class FrontLoginController extends Controller
{
    public function index(){
        $page_login = Page::select('login_title','login_status')->first();
        return view('front.login', compact('page_login'));
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( Auth::guard('author')->attempt($credentials) ){
            return redirect()->route('author_home')->with('success', 'Welcome back '.Auth::guard('author')->user()->name);
        }
        return redirect()->route('login')->with('error', 'User not found!!');
    } 

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $token = hash('sha256', time());
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('home')->with('error', 'Email address not found!!');
        }
        $user_add = new User();
        $user_add->email = $request->email;
        $user_add->password = Hash::make($request->password);
        $user_add->remember_token = $token;
        $user_add->save();

        return redirect()->route('login')->with('error', 'User not found!!');
    }

    public function forget_password(){
        return view('front.forget_password');
    }
    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = hash('sha256', time());
        $author = Author::where('email', $request->email)->first();
        if(!$author){
            return redirect()->route('author_forget_password')->with('error', 'Email address not found!!');
        }
        $author->token = $token;
        $author->update();

        $veryfication_link = url('reset-password/'.$token."/".$request->email);
        $subject = "Reset Password";
        $messge = 'Plesase click on this link: <a href="'.$veryfication_link.'">click here</a>';

        Mail::to($request->email)->send( new websiteMail($subject, $messge));
        
        return redirect()->route('author_forget_password')->with('success', 'Check your email');
    }

    public function reset_password($token, $email){
        $author = Author::where('token', $token)->where('email', $email)->first();
        if(!$author){
            return redirect()->route('home')->with('error', 'Email address not found!!');
        }
        return view('front.reset_password', compact('token', 'email'));
    }
    public function reset_password_submit(Request $request ){
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $author = Author::where('token', $request->token)->where('email', $request->email)->first();
        if(!$author){
            return redirect()->route('login')->with('error', 'Email address not found!!');
        }
        $author->token = "";
        $author->password = Hash::make($request->password);
        $author->update();
        return redirect()->route('login')->with('success', 'Success change password');
    }
    public function logout(){
        Auth::guard('author')->logout();
        return redirect()->route('login');
    }
}
