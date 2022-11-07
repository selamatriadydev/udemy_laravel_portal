<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class AdminProfileController extends Controller
{
    public function index(){
        return view('admin.profile.profile');
    }

    public function profile_submit(Request $request){
        $admin = Admin::where('email', $request->email)->where('id', Auth::guard('admin')->user()->id )->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'confirm_password' => 'same:password',
        ]);
        if( $request->password != ""){
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:confirm_password',
            ]);

            $admin->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:png,jpg,gif',
            ]);

            if(file_exists(public_path('upload/profile/'.$admin->photo))){
                // unlink( public_path('upload/profile/'.$admin->photo) );
                File::deleteDirectory('upload/profile/'.$admin->photo);
            }

            $ext = $request->file('photo')->extension();
            $name_admin = str_replace(" ", "-", $admin->name);
            $time = time();
            $final_name = 'admin-'.$name_admin.'-'.$time.'.'.$ext;
            $request->file('photo')->move('upload/profile',$final_name);
            $admin->photo = $final_name;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->route('admin_profile')->with('success', 'Profile information is save successfully');
    }
}
