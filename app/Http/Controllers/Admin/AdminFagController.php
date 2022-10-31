<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFagController extends Controller
{
    public function index(){
        $faqs = Faq::paginate(10);
        return view('admin.faq.faq_show', compact('faqs'));
    }
    public function create(){
        return view('admin.faq.faq_add');
    }
    public function create_submit(Request $request){
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);
        $faq_status = $request->faq_status == 'Show' ? 'Show' : 'Hide';
        $faq_add = new Faq();
        $faq_add->faq_title = $request->faq_title;
        $faq_add->faq_detail = $request->faq_detail;
        $faq_add->faq_status = $faq_status;
        $faq_add->save();

        return redirect()->route('admin_faq')->with('success', 'Data is created successfully');
    }

    public function edit($id){
        $faq_single = Faq::find($id);
        if(!$faq_single){
            return redirect()->route('admin_faq')->with('error', 'Data is not found!!');
        }
        return view('admin.faq.faq_update', compact('faq_single'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);
        $faq_update = Faq::find($id);
        if(!$faq_update){
            return redirect()->route('admin_faq')->with('error', 'Data is not found!!');
        }
        $faq_status = $request->faq_status == 'Show' ? 'Show' : 'Hide';
        $faq_update->faq_title = $request->faq_title;
        $faq_update->faq_detail = $request->faq_detail;
        $faq_update->faq_status = $faq_status;
        $faq_update->update();

        return redirect()->route('admin_faq')->with('success', 'Data is updated successfully');
    }

    public function delete($id){
        $faq_single = Faq::find($id);
        if(!$faq_single){
            return redirect()->route('admin_faq')->with('error', 'Data is not found!!');
        }
        $faq_single->delete();

        return redirect()->route('admin_faq')->with('success', 'Data is deleted successfully');
    }
}
