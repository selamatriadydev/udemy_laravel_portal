<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\websiteMail;
use App\Models\Subscriber;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth; 

class AuthorPostController extends Controller
{
    public function index(Request $request){ 
        $filter_list = ['title'=>'Title', 'category'=>'Category', 'sub_category'=>'Sub Category', 'status'=>'Status','language'=> 'Language'];

        $posts = Post::with('rSubCategory.rCategory')
        ->when($request->key_search, function($q) use ($request){
            if($request->key_search == 'title'){
                $q->where('post_title',  'like', '%'.$request->val_search.'%');
            }elseif($request->key_search == 'category'){
                $q->whereHas('rSubCategory.rCategory', function ($query) use ($request) {
                    $query->where('category_name', 'like', '%'.$request->val_search.'%');
                });
            }elseif($request->key_search == 'sub_category'){
                $q->whereHas('rSubCategory', function ($query) use ($request) {
                    $query->where('sub_category_name', 'like', '%'.$request->val_search.'%');
                });
            }elseif($request->key_search == 'status'){
                $q->where('is_publish', 'like', '%'.$request->val_search.'%');
            }elseif($request->key_search == 'language'){
                $q->whereHas('rLanguage', function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->val_search.'%')->orWhere('short_name', 'like', '%'.$request->val_search.'%');
                });
            }
        })
        ->where('author_id', Auth::guard('author')->user()->id)->paginate(10);
        return view('author.post.post_show', compact('posts','filter_list'));
    }

    public function create(){
        $language_data = Language::get();
        $category = Category::orderBy('category_order', 'asc')->get();
        return view('author.post.post_add', compact('category','language_data'));
    }
    public function create_submit(Request $request){
        // dd($tag_array);
        $request->validate([
            'language' => 'required',
            'category_name' => 'required',
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $is_share = $request->is_share == '1' ? '1' : '0';
        $is_comment = $request->is_comment == '1' ? '1' : '0';
        $is_publish = $request->is_publish == '1' ? '1' : '0';

        if($request->hasFile('post_photo')){
            $ext = $request->file('post_photo')->extension();
            $now = time();
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
        $post->author_id = Auth::guard('author')->user() ? Auth::guard('author')->user()->id : 0;
        $post->admin_id = 0;
        $post->is_share = $is_share;
        $post->is_comment = $is_comment;
        $post->is_publish = $is_publish;
        $post->language_id = $request->language;
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
        //sending this post to subscribers
        if($request->is_publish == 1 && $request->subscriber_send_option == 1){
            // Email is Send
            $subject ="A new post is published";
            $messge  = "Hi, a new post is published into our website. Please go to see that post: <br>";
            $messge .= '<a href="'.route('news_detail', $post->id).'" target="_blank">';
            $messge .= $request->post_title;
            $messge .= '</a>';
            $subscribers = Subscriber::select('email')->distinct()->where('status', 'Active')->get();
            foreach($subscribers as $item){
                Mail::to($item->email)->send( new websiteMail($subject, $messge));
            }
        }

        return redirect()->route('author_post')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $category = Category::orderBy('category_order', 'asc')->get();
        $post_single = Post::with('rTag')->find($id);
        $language_data = Language::get();
        if(!$post_single){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
        }elseif($post_single->author_id != Auth::guard('author')->user()->id){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
        }
        return view('author.post.post_update', compact('category','post_single','language_data'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'language' => 'required',
            'category_name' => 'required',
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);
        $post_single = Post::find($id);
        if(!$post_single){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
        }elseif($post_single->author_id != Auth::guard('author')->user()->id){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
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
        $post_single->is_share = $is_share;
        $post_single->is_comment = $is_comment;
        $post_single->is_publish = $is_publish;
        $post_single->language_id = $request->language;
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
        return redirect()->route('author_post')->with('success', 'Data is updated successfully');
    }

    public function delete_tag($id_post, $id_tag){
        $post_count = Post::where('id', $id_post)->where('author_id', Auth::guard('author')->user()->id)->count();
        if(!$post_count){
            return redirect()->route('author_post_edit', $id_post)->with('error', 'Data post is not found!!');
        }
        $tag = Tag::find($id_tag);
        if(!$tag){
            return redirect()->route('author_post_edit', $id_post)->with('error', 'Data is not found!!');
        }
        $tag->delete();

        return redirect()->route('author_post_edit', $id_post)->with('success', 'Data is deleted successfully');
    }

    public function delete($id){
        $post_single = Post::with('rTag')->find($id);
        if(!$post_single){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
        }elseif($post_single->author_id != Auth::guard('author')->user()->id){
            return redirect()->route('author_post')->with('error', 'Data is not found!!');
        }
        if(file_exists(public_path('upload/post/'.$post_single->post_photo))){
            File::deleteDirectory('upload/post/'.$post_single->post_photo);
        }
        $post_single->delete();

        return redirect()->route('author_post')->with('success', 'Data is deleted successfully');
    }
}
