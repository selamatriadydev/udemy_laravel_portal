<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\websiteMail;
use File;

class AdminAuthorcontroller extends Controller
{
    public function index(){
        $authot_lists = Author::paginate(10);
        return view('admin.author_list.author_list', compact('authot_lists'));
    }

    public function create(){
        return view('admin.author_list.author_list_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'author_name' => 'required',
            'author_email' => 'required|email|unique:authors,email',
            'author_password' => 'required',
            'author_password_confirm' => 'required|same:author_password',
        ]);
        $author_status = $request->author_status == 'Active' ? 'Active' : 'Pending';
        $author_add = new Author();
        $author_add->name = $request->author_name;
        $author_add->email = $request->author_email;
        $author_add->password = Hash::make($request->author_password);
        $author_add->status = $author_status;
        if($author_status == 'Pending'){
            $token = hash('sha256', time());
            $author_add->token = $token;
        }else{
            $author_add->token = "";
        }
        if($request->hasFile('author_photo')){
            $request->validate([
                'author_photo' => 'image|mimes:png,jpg,gif',
            ]);
            $ext = $request->file('author_photo')->extension();
            $name_author = str_replace(" ", "-", $request->author_name);
            $final_name = 'author-'.$name_author.'-'.time().'.'.$ext;
            $request->file('author_photo')->move('upload/profile',$final_name);
            $author_add->photo = $final_name;
        }else{
            $author_add->photo = "";
        }
        $author_add->save();

        if($author_status == 'Active'){
            // Email is Send
            $subject ="Your account is created to the website";
            $messge  = "Hi, <b>".$request->author_name."</b>. Your account is created successfully and you can login to our system from the front end login page. Please go to this link :<br>";
            $messge .= '<a href="'.route('login').'" target="_blank">';
            $messge .= 'Click here';
            $messge .= '</a>';
            $messge .= '<br><br>';
            $messge .= 'Please See your password here after login, change that immediately : <br>';
            $messge .= '<b>Author Email Address</b>: '.$request->author_email;
            $messge .= '<br>';
            $messge .= '<b>Author Password</b>: '.$request->author_password;
            Mail::to($request->author_email)->send( new websiteMail($subject, $messge));
        }

        return redirect()->route('admin_author_section_list')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $author_single = Author::find($id);
        if(!$author_single){
            return redirect()->route('admin_author_section_list')->with('error', 'Data is not found!!');
        }
        return view('admin.author_list.author_list_update', compact('author_single'));
    }

    public function edit_submit(Request $request,$id){
        $author_update = Author::find($id);

        $request->validate([
            'author_name' => 'required',
            'author_email' => [
                'required',
                'email',
                'unique:authors,email,'.$id
            ],
        ]);
        if(!$author_update){
            return redirect()->route('admin_author_section_list')->with('error', 'Data is not found!!');
        }
        $author_status = $request->author_status == 'Active' ? 'Active' : 'Pending';
        $send_email = 0;
        if($author_update->token != '' && $author_update->status == 'Pending' && $author_status == 'Active'){
            $author_update->token = "";
            $send_email = 1;
        }
        $author_update->name = $request->author_name;
        $author_update->email = $request->author_email;
        if($request->author_password !=""){
            $request->validate([
                'author_password' => 'required',
                'author_password_confirm' => 'required|same:author_password',
            ]);
            $author_update->password = Hash::make($request->author_password);
        }

        if($request->hasFile('author_photo')){
            $request->validate([
                'author_photo' => 'image|mimes:png,jpg,gif',
            ]);

            if(file_exists(public_path('upload/profile/'.$author_update->photo))){
                File::deleteDirectory('upload/profile/'.$author_update->photo);
            }

            $ext = $request->file('author_photo')->extension();
            $name_author = str_replace(" ", "-", $request->author_name);
            $final_name = 'author-'.$name_author.'-'.time().'.'.$ext;
            $request->file('author_photo')->move('upload/profile',$final_name);
            $author_update->photo = $final_name;
        }
        $author_update->status = $author_status;
        $author_update->update();

        if($send_email == 1){
            // Email is Send
            $subject ="Your account is created to the website";
            $messge  = "Hi, <b>".$request->author_name."</b>. Your account is created successfully and you can login to our system from the front end login page. Please go to this link :<br>";
            $messge .= '<a href="'.route('login').'" target="_blank">';
            $messge .= 'Click here';
            $messge .= '</a>';
            $messge .= '<br><br>';
            $messge .= 'Please See your password here after login, change that immediately : <br>';
            $messge .= '<b>Author Email Address</b>: '.$request->author_email;
            $messge .= '<br>';
            $messge .= '<b>Author Password</b>: '.$request->author_password;
            Mail::to($request->author_email)->send( new websiteMail($subject, $messge));
        }

        return redirect()->route('admin_author_section_list')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $author_delete = Author::find($id);
        if(!$author_delete){
            return redirect()->route('admin_author_section_list')->with('error', 'Data is not found!!');
        }
        if($author_delete->photo !=""){
            if(file_exists(public_path('upload/profile/'.$author_delete->photo))){
                File::deleteDirectory('upload/profile/'.$author_delete->photo);
            }
        }
        $author_delete->delete();

        return redirect()->route('admin_author_section_list')->with('success', 'Data is deleted successfully');
    }
}
