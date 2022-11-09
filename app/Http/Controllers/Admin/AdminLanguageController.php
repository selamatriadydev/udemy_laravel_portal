<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request; 
use File;

class AdminLanguageController extends Controller 
{
    public function index(){
        $language_data = Language::paginate(10);
        return view('admin.language.language_show', compact('language_data'));
    }

    public function create(){
        return view('admin.language.language_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'language_name' => 'required',
            'language_short_name' => 'required|unique:languages,short_name',
        ]);

        $check_default_ready = Language::where('is_default', 'Yes')->count();
        if($check_default_ready){
            $request->validate([
                'language_default' => 'unique:languages,is_default',
            ]);
        }
        $language_add = new Language();
        $language_add->name = $request->language_name;
        $language_add->short_name = $request->language_short_name;
        $language_add->is_default = $request->language_default == 'Yes' ? 'Yes' : 'No';
        $language_add->save();
        //static
        $sample_data =file_get_contents(resource_path('languages/sample.json'));
        file_put_contents(resource_path('languages/'.$request->language_short_name.'.json'), $sample_data);

        return redirect()->route('admin_language')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $language_single = Language::find($id);
        if(!$language_single){
            return redirect()->route('admin_language')->with('error', 'Data is not found!!');
        }
        return view('admin.language.language_update', compact('language_single'));
    }

    public function edit_submit(Request $request,$id){
        // dd($request->all());
        $request->validate([
            'language_name' => 'required',
            // 'language_short_name' => 'required|unique:languages,short_name,'.$id,
        ]);
        $check_default_ready = Language::where('is_default', 'Yes')->where('id', '!=', $id)->count();
        if($check_default_ready){
            $request->validate([
                'language_default' => 'unique:languages,is_default',
            ]);
        }
        $language_update = Language::find($id);
        if(!$language_update){
            return redirect()->route('admin_language')->with('error', 'Data is not found!!');
        }
        $language_update->name = $request->language_name;
        // $language_update->short_name = $request->language_short_name;
        $language_update->is_default = $request->language_default == 'Yes' ? 'Yes' : 'No';
        $language_update->update();

        return redirect()->route('admin_language')->with('success', 'Data is updated successfully');
    }

    public function edit_detail($id){
        $language_single = Language::find($id);
        if(!$language_single){
            return redirect()->route('admin_language')->with('error', 'Data is not found!!');
        }
        $lang_json_data = json_decode(file_get_contents(resource_path('languages/'.$language_single->short_name.'.json')));
        return view('admin.language.language_update_detail', compact('language_single','lang_json_data'));
    }
    public function edit_detail_submit(Request $request,$id){
        // dd($request->all());
        $language_update = Language::find($id);
        if(!$language_update){
            return redirect()->route('admin_language')->with('error', 'Data is not found!!');
        }
        $data_update = [];
        foreach($request->arr_key as $key=>$value){
            $data_update[$value] = $request->arr_value[$key];
        }
        $after_encode = json_encode($data_update, JSON_PRETTY_PRINT);
        file_put_contents( resource_path('languages/'.$language_update->short_name.'.json'), $after_encode);
        // dd($data_update);
        return redirect()->route('admin_language_edit_detail', $id)->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $language_delete = Language::find($id);
        if(!$language_delete){
            return redirect()->route('admin_language')->with('error', 'Data is not found!!');
        }elseif($language_delete->is_default == 'Yes'){
            $language_set_default = Language::first();
            $language_set_default->is_default = 'Yes';
            $language_set_default->update();
        }

        if(file_exists(resource_path('languages/'.$language_delete->short_name.'.json'))){
            File::delete(resource_path('languages/'.$language_delete->short_name.'.json'));
        }
        // dd($language_delete);

        $language_delete->delete();

        return redirect()->route('admin_language')->with('success', 'Data is deleted successfully');
    }
}
