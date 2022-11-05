<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function logout(){
        Auth::guard('author')->logout();
        return redirect()->route('login');
    }
}
