<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class AuthorProfileController extends Controller
{
    public function index(){
        return view('author.profile.profile');
    }

    public function profile_submit(Request $request){
        $admin = Author::where('email', $request->email)->where('id', Auth::guard('author')->user()->id )->first();
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

            if(file_exists(public_path('upload/author/'.$admin->photo))){
                File::deleteDirectory('upload/author/'.$admin->photo);
            }

            $ext = $request->file('photo')->extension();
            $name_admin = str_replace(" ", "-", $admin->name);
            $final_name = 'author-'.$name_admin.'-'.time().'.'.$ext;
            $request->file('photo')->move('upload/author',$final_name);
            $admin->photo = $final_name;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->route('author_profile')->with('success', 'Profile information is save successfully');
    }
}
