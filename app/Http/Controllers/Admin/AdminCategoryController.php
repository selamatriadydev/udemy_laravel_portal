<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $category = Category::with('rLanguage')->orderBy('category_order', 'asc')->paginate(10);
        return view('admin.category.category', compact('category'));
    }

    public function create(){
        $language_data = Language::get();
        return view('admin.category.category_add', compact('language_data'));
    } 
    public function create_submit(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
            'language' => 'required',
        ]);
        $status_category = $request->category_on_menu == 'Show' ? 'Show' : 'Hide';
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->show_on_menu = $status_category;
        $category->category_order = $request->category_order ? $request->category_order : 0;
        $category->language_id = $request->language;
        $category->save();

        return redirect()->route('admin_category')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        $language_data = Language::get();
        if(!$category){
            return redirect()->route('admin_category')->with('error', 'Data is not found!!');
        }
        return view('admin.category.category_update', compact('category', 'language_data'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
            'language' => 'required',
        ]);
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin_category')->with('error', 'Data is not found!!');
        }
        $status_category = $request->category_on_menu == 'Show' ? 'Show' : 'Hide';
        $category->category_name = $request->category_name;
        $category->show_on_menu = $status_category;
        $category->category_order = $request->category_order ? $request->category_order : 0;
        $category->language_id = $request->language;
        $category->update();

        return redirect()->route('admin_category')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin_category')->with('error', 'Data is not found!!');
        }
        $category->delete();

        return redirect()->route('admin_category')->with('success', 'Data is deleted successfully');
    }
}
