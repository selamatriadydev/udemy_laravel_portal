<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        return view('multi_user.admin.login');
    }

    public function login_submit(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if( Auth::guard('admin')->attempt($credentials) ) {
            return redirect()->route('dashboard_admin');
        }else{
            return redirect()->route('admin_login');
        }
    }
    public function dashboard(){
        return view('multi_user.admin.dashbord');
    }
    public function settings(){
        return view('multi_user.admin.settings');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
