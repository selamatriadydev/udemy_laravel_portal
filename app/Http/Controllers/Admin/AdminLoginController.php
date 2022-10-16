<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\websiteMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index(){
        // dd(Hash::make('123'));
        return view('admin.login');
    }
    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // echo $request->email;
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( Auth::guard('admin')->attempt($credentials) ){
            return redirect()->route('admin_home');
        }
        return redirect()->route('admin_login')->with('error', 'User not found!!');
    }

    public function forget_password(){
        return view('admin.login_forget_password');
    }
    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = hash('sha256', time());
        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->route('admin_forget_password')->with('error', 'Email address not found!!');
        }
        $admin->token = $token;
        $admin->update();

        $veryfication_link = url('admin/recover-password/'.$token."/".$request->email);
        $subject = "Reset Password";
        $messge = 'Plesase click on this link: <a href="'.$veryfication_link.'">click here</a>';

        Mail::to($request->email)->send( new websiteMail($subject, $messge));
        
        return redirect()->route('admin_forget_password')->with('success', 'Check your email');
    }

    public function recover_password($token, $email){
        $admin = Admin::where('token', $token)->where('email', $email)->first();
        if(!$admin){
            return redirect()->back()->with('error_recover', 'Email address not found!!');
        }
        return view('admin.login_recover_password', compact('token', 'email'));
    }
    public function recover_password_submit(Request $request ){
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:confirm_password',
        ]);
        $admin = Admin::where('token', $request->token)->where('email', $request->email)->first();
        if(!$admin){
            return redirect()->route('admin_login')->with('error', 'Email address not found!!');
        }
        $admin->token = "";
        $admin->password = Hash::make($request->password);
        $admin->update();
        return redirect()->route('admin_login')->with('success', 'Success change password');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
