<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $category = Category::orderBy('category_order', 'asc')->paginate(10);
        return view('admin.category.category', compact('category'));
    }

    public function create(){
        return view('admin.category.category_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);
        $status_category = $request->category_on_menu == 'Show' ? 'Show' : 'Hide';
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->show_on_menu = $status_category;
        $category->category_order = $request->category_order ? $request->category_order : 0;
        $category->save();

        return redirect()->route('admin_category')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin_category')->with('error', 'Data is not found!!');
        }
        return view('admin.category.category_update', compact('category'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin_category')->with('error', 'Data is not found!!');
        }
        $status_category = $request->category_on_menu == 'Show' ? 'Show' : 'Hide';
        $category->category_name = $request->category_name;
        $category->show_on_menu = $status_category;
        $category->category_order = $request->category_order ? $request->category_order : 0;
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
