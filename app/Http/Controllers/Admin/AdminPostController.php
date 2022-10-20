<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;

class AdminPostController extends Controller
{
    public function index(){ 
        $posts = Post::with('rSubCategory.rCategory')->paginate(10);
        return view('admin.post.post_show', compact('posts'));
    }

    public function create(){
        $category = Category::orderBy('category_order', 'asc')->get();
        // $sub_category = SubCategory::orderBy('sub_category_order', 'asc')->get();
        return view('admin.post.post_add', compact('category'));
    }
    public function create_submit(Request $request){
        // dd($request->all());
        // $tag_array = explode(",",$request->post_tag);
        // $tag_array = array_filter($tag_array);//remove empty value
        // $tag_array = array_map('trim', $tag_array);//remove white space
        // $tag_array = array_unique($tag_array); //remove duplicat
        // dd($tag_array);
        $request->validate([
            'category_name' => 'required',
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $is_share = $request->is_share == '1' ? '1' : '0';
        $is_comment = $request->is_comment == '1' ? '1' : '0';
        $is_publish = $request->is_publish == '1' ? '1' : '0';

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;
        // dd($ai_id);

        if($request->hasFile('post_photo')){
            $ext = $request->file('post_photo')->extension();
            $now = time();
            // $name = str_replace(' ', '-', $request->post_title);
            // $name = strtolower($name);
            // $final_name = $name.'-'.$now.'.'.$ext;
            $final_name = 'post-photo-'.$now.'.'.$ext;
            $date = date('Y');
            $path = 'upload/post/'.$date."/";
            $request->file('post_photo')->move(public_path($path),$final_name);
            $file_final_name = $date."/".$final_name;
        }

        $post = new Post();
        $post->sub_category_id = $request->category_name;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_photo = $file_final_name;
        $post->visitor = 1;
        $post->author_id = Auth::guard('web')->user() ? Auth::guard('web')->user()->id : 0;
        $post->admin_id = Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : 0;
        $post->is_share = $is_share;
        $post->is_comment = $is_comment;
        $post->is_publish = $is_publish;
        $post->save();

        if($request->post_tag !=""){
            $tag_array = explode(",",$request->post_tag);
            $tag_array = array_filter($tag_array);//remove empty value
            $tag_array = array_map('trim', $tag_array);//remove white space
            $tag_array = array_unique($tag_array); //remove duplicat
            // dd(count($tag_array));
            foreach($tag_array as $tag){
                $tag_count = Tag::where('post_id', $post->id)->where('tag_name', $tag)->count();
                if(!$tag_count){
                    Tag::create(['post_id'=> $post->id, 'tag_name' => $tag]);
                }
            }
        }

        return redirect()->route('admin_post')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $category = Category::orderBy('category_order', 'asc')->get();
        $post_single = Post::with('rTag')->find($id);
        // $existing_tag = Tag::where('post_id', $post_single->id)->get();
        // dd($existing_tag);
        if(!$post_single){
            return redirect()->route('admin_post')->with('error', 'Data is not found!!');
        }
        return view('admin.post.post_update', compact('category','post_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);
        $post_single = Post::find($id);
        if(!$post_single){
            return redirect()->route('admin_post')->with('error', 'Data is not found!!');
        }
        $is_share = $request->is_share == '1' ? '1' : '0';
        $is_comment = $request->is_comment == '1' ? '1' : '0';
        $is_publish = $request->is_publish == '1' ? '1' : '0';

        if($request->hasFile('post_photo')){
            $request->validate([
                'post_photo' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists(public_path('upload/post/'.$post_single->post_photo))){
                File::deleteDirectory('upload/post/'.$post_single->post_photo);
            }

            $ext = $request->file('post_photo')->extension();
            $now = time();
            // $name = str_replace(' ', '-', $request->post_title);
            // $name = strtolower($name);
            // $final_name = $name.'-'.$now.'.'.$ext;
            $final_name = 'post-photo-'.$now.'.'.$ext;
            $date = date('Y');
            $path = 'upload/post/'.$date."/";
            $request->file('post_photo')->move(public_path($path),$final_name);
            $file_final_name = $date."/".$final_name;
            $post_single->post_photo = $file_final_name;
        }
        $post_single->sub_category_id = $request->category_name;
        $post_single->post_title = $request->post_title;
        $post_single->post_detail = $request->post_detail;
        // $post_single->author_id = Auth::guard('web')->user() ? Auth::guard('web')->user()->id : 0;
        // $post_single->admin_id = Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : 0;
        $post_single->is_share = $is_share;
        $post_single->is_comment = $is_comment;
        $post_single->is_publish = $is_publish;
        $post_single->update();

        if($request->post_tag !=""){
            $tag_array = explode(",",$request->post_tag);
            $tag_array = array_filter($tag_array);//remove empty value
            $tag_array = array_map('trim', $tag_array);//remove white space
            $tag_array = array_unique($tag_array); //remove duplicat
            foreach($tag_array as $tag){
                $tag_count = Tag::where('post_id', $id)->where('tag_name', $tag)->count();
                if(!$tag_count){
                    Tag::create(['post_id'=> $id, 'tag_name' => $tag]);
                }
            }
        }
        return redirect()->route('admin_post')->with('success', 'Data is updated successfully');
    }

    public function delete_tag($id_post, $id_tag){
        $tag = Tag::find($id_tag);
        if(!$tag){
            return redirect()->route('admin_post_edit', $id_post)->with('error', 'Data is not found!!');
        }
        $tag->delete();

        return redirect()->route('admin_post_edit', $id_post)->with('success', 'Data is deleted successfully');
    }

    public function delete($id){
        $post_single = Post::with('rTag')->find($id);
        if(!$post_single){
            return redirect()->route('admin_post')->with('error', 'Data is not found!!');
        }
        if(file_exists(public_path('upload/post/'.$post_single->post_photo))){
            File::deleteDirectory('upload/post/'.$post_single->post_photo);
        }
        $post_single->delete();

        return redirect()->route('admin_post')->with('success', 'Data is deleted successfully');
    }
}
