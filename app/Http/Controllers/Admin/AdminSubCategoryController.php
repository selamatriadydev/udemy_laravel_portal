<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{
    public function index(){ 
        $sub_category = SubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->paginate(10);
        return view('admin.sub_category.sub_category', compact('sub_category'));
    }

    public function create(){
        $category = Category::orderBy('category_order', 'asc')->get();
        return view('admin.sub_category.sub_category_add', compact('category'));
    }
    public function create_submit(Request $request){
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);
        $status_sub_category = $request->sub_category_on_menu == 'Show' ? 'Show' : 'Hide';
        $sub_category = new SubCategory();
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->show_on_menu = $status_sub_category;
        $sub_category->sub_category_order = $request->sub_category_order ? $request->sub_category_order : 0;
        $sub_category->save();

        return redirect()->route('admin_sub_category')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $category = Category::orderBy('category_order', 'asc')->get();
        $sub_category = SubCategory::find($id);
        if(!$sub_category){
            return redirect()->route('admin_sub_category')->with('error', 'Data is not found!!');
        }
        return view('admin.sub_category.sub_category_update', compact('category','sub_category'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);
        $sub_category = SubCategory::find($id);
        if(!$sub_category){
            return redirect()->route('admin_sub_category')->with('error', 'Data is not found!!');
        }
        $status_sub_category = $request->sub_category_on_menu == 'Show' ? 'Show' : 'Hide';
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->show_on_menu = $status_sub_category;
        $sub_category->sub_category_order = $request->sub_category_order ? $request->sub_category_order : 0;
        $sub_category->update();

        return redirect()->route('admin_sub_category')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $sub_category = SubCategory::find($id);
        if(!$sub_category){
            return redirect()->route('admin_sub_category')->with('error', 'Data is not found!!');
        }
        $sub_category->delete();

        return redirect()->route('admin_sub_category')->with('success', 'Data is deleted successfully');
    }
}
