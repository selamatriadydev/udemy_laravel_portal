<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    // about start
    public function about(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $about_single = Page::select('about_title', 'about_detail','about_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $about_title = "";
        $about_detail = "";
        $about_status = "";
        if($about_single){
            $about_title = $about_single->about_title;
            $about_detail = $about_single->about_detail;
            $about_status = $about_single->about_status;
        }
        return view('admin.page.about.about_show', compact('about_title', 'about_detail', 'about_status', 'language_data','lang_id'));
    }
    public function about_edit_submit(Request $request){
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required',
        ]);
        $about_status = $request->about_status == 'Show' ? 'Show' : 'Hide';
        $about_single = Page::where('language_id',$request->lang_id)->first();
        if($about_single){
            $about_update = Page::find($about_single->id);
            $about_update->about_title = $request->about_title;
            $about_update->about_detail= $request->about_detail;
            $about_update->about_status= $about_status;
            $about_update->update();
        }else{
            $about = new Page();
            $about->about_title = $request->about_title;
            $about->about_detail= $request->about_detail;
            $about->about_status= $about_status;
            $about->language_id= $request->lang_id;
            $about->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_about_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_about')->with('success', 'Data is updated successfully');
    }
    // about end


    // faq start
    public function faq(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $faq_single = Page::select('faq_title', 'faq_detail','faq_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $faq_title = "";
        $faq_detail = "";
        $faq_status = "";
        if($faq_single){
            $faq_title = $faq_single->faq_title;
            // $faq_detail = $faq_single->faq_detail;
            $faq_status = $faq_single->faq_status;
        }
        return view('admin.page.faq.faq_show', compact('faq_title', 'faq_detail', 'faq_status', 'language_data', 'lang_id'));
    }
    public function faq_edit_submit(Request $request){
        $request->validate([
            'faq_title' => 'required',
            // 'faq_detail' => 'required',
        ]);
        $faq_status = $request->faq_status == 'Show' ? 'Show' : 'Hide';
        $faq_single = Page::where('language_id',$request->lang_id)->first();
        if($faq_single){
            $faq_update = Page::find($faq_single->id);
            $faq_update->faq_title = $request->faq_title;
            // $faq_update->faq_detail= $request->faq_detail;
            $faq_update->faq_detail= $request->faq_title;
            $faq_update->faq_status= $faq_status;
            $faq_update->update();
        }else{
            $faq = new Page();
            $faq->faq_title = $request->faq_title;
            // $faq->faq_detail= $request->faq_detail;
            $faq->faq_detail= $request->faq_title;
            $faq->faq_status= $faq_status;
            $faq->language_id= $request->lang_id;
            $faq->save();
        } 
        if($request->lang_id){
            return redirect()->route('admin_page_faq_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_faq')->with('success', 'Data is updated successfully');
    }
    // faq end

    // contact start
    public function contact(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $contact_single = Page::select('contact_title', 'contact_detail','contact_map','contact_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $contact_title = "";
        $contact_detail = "";
        $contact_map = "";
        $contact_status = "";
        if($contact_single){
            $contact_title = $contact_single->contact_title;
            $contact_detail = $contact_single->contact_detail;
            $contact_map = $contact_single->contact_map;
            $contact_status = $contact_single->contact_status;
        }
        return view('admin.page.contact.contact_show', compact('contact_title', 'contact_detail', 'contact_status','contact_map', 'language_data', 'lang_id'));
    }
    public function contact_edit_submit(Request $request){
        $request->validate([
            'contact_title' => 'required',
            'contact_detail' => 'required',
            'contact_map' => 'required',
        ]);
        $contact_status = $request->contact_status == 'Show' ? 'Show' : 'Hide';
        $contact_single = Page::where('language_id',$request->lang_id)->first();
        if($contact_single){
            $contact_update = Page::find($contact_single->id);
            $contact_update->contact_title = $request->contact_title;
            $contact_update->contact_detail= $request->contact_detail;
            $contact_update->contact_map= $request->contact_map;
            $contact_update->contact_status= $contact_status;
            $contact_update->update();
        }else{
            $contact = new Page();
            $contact->contact_title = $request->contact_title;
            $contact->contact_detail= $request->contact_detail;
            $contact->contact_map= $request->contact_map;
            $contact->contact_status= $contact_status;
            $contact->language_id= $request->lang_id;
            $contact->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_contact_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_contact')->with('success', 'Data is updated successfully');
    }
    // contact end

    // login start
    public function login(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();

        $login_single = Page::select('login_title','login_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $login_title = "";
        $login_status = "";
        if($login_single){
            $login_title = $login_single->login_title;
            $login_status = $login_single->login_status;
        }
        return view('admin.page.login.login_show', compact('login_title', 'login_status', 'language_data','lang_id'));
    }
    public function login_edit_submit(Request $request){
        $request->validate([
            'login_title' => 'required',
        ]);
        $login_status = $request->login_status == 'Show' ? 'Show' : 'Hide';
        $login_single = Page::where('language_id',$request->lang_id)->first();
        if($login_single){
            $login_update = Page::find($login_single->id);
            $login_update->login_title = $request->login_title;
            $login_update->login_status= $login_status;
            $login_update->update();
        }else{
            $login = new Page();
            $login->login_title = $request->login_title;
            $login->login_status= $login_status;
            $login->language_id= $request->lang_id;
            $login->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_login_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_login')->with('success', 'Data is updated successfully');
    }
    // login end

    // terms start
    public function terms(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $terms_single = Page::select('terms_title', 'terms_detail','terms_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $terms_title = "";
        $terms_detail = "";
        $terms_status = "";
        if($terms_single){
            $terms_title = $terms_single->terms_title;
            $terms_detail = $terms_single->terms_detail;
            $terms_status = $terms_single->terms_status;
        }
        return view('admin.page.terms.terms_show', compact('terms_title', 'terms_detail', 'terms_status', 'language_data', 'lang_id'));
    }
    public function terms_edit_submit(Request $request){
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required',
        ]);
        $terms_status = $request->terms_status == 'Show' ? 'Show' : 'Hide';
        $terms_single = Page::where('language_id',$request->lang_id)->first();
        if($terms_single){
            $terms_update = Page::find($terms_single->id);
            $terms_update->terms_title = $request->terms_title;
            $terms_update->terms_detail= $request->terms_detail;
            $terms_update->terms_status= $terms_status;
            $terms_update->update();
        }else{
            $terms = new Page();
            $terms->terms_title = $request->terms_title;
            $terms->terms_detail= $request->terms_detail;
            $terms->terms_status= $terms_status;
            $terms->language_id= $request->lang_id;
            $terms->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_terms_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_terms')->with('success', 'Data is updated successfully');
    }
    // terms end

    // privacy start
    public function privacy(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $privacy_single = Page::select('privacy_title', 'privacy_detail','privacy_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $privacy_title = "";
        $privacy_detail = "";
        $privacy_status = "";
        if($privacy_single){
            $privacy_title = $privacy_single->privacy_title;
            $privacy_detail = $privacy_single->privacy_detail;
            $privacy_status = $privacy_single->privacy_status;
        }
        return view('admin.page.privacy.privacy_show', compact('privacy_title', 'privacy_detail', 'privacy_status', 'language_data', 'lang_id'));
    }
    public function privacy_edit_submit(Request $request){
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required',
        ]);
        $privacy_status = $request->privacy_status == 'Show' ? 'Show' : 'Hide';
        $privacy_single = Page::where('language_id',$request->lang_id)->first();
        if($privacy_single){
            $privacy_update = Page::find($privacy_single->id);
            $privacy_update->privacy_title = $request->privacy_title;
            $privacy_update->privacy_detail= $request->privacy_detail;
            $privacy_update->privacy_status= $privacy_status;
            $privacy_update->update();
        }else{
            $privacy = new Page();
            $privacy->privacy_title = $request->privacy_title;
            $privacy->privacy_detail= $request->privacy_detail;
            $privacy->privacy_status= $privacy_status;
            $privacy->language_id= $request->lang_id;
            $privacy->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_privacy_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_privacy')->with('success', 'Data is updated successfully');
    }
    // privacy end

    // disclaimer start
    public function disclaimer(Request $request){
        $lang_id = "";
        if($request->lang !=""){
            $lang_id = $request->lang;
        }else{
            $language_data_default = Language::orderBy('id','asc')->first();
            $lang_id = $language_data_default->id;
        }
        $language_data = Language::orderBy('id','asc')->get();
        $disclaimer_single = Page::select('disclaimer_title', 'disclaimer_detail','disclaimer_status')
        ->when($lang_id, function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        })
        ->first();
        $disclaimer_title = "";
        $disclaimer_detail = "";
        $disclaimer_status = "";
        if($disclaimer_single){
            $disclaimer_title = $disclaimer_single->disclaimer_title;
            $disclaimer_detail = $disclaimer_single->disclaimer_detail;
            $disclaimer_status = $disclaimer_single->disclaimer_status;
        }
        return view('admin.page.disclaimer.disclaimer_show', compact('disclaimer_title', 'disclaimer_detail', 'disclaimer_status', 'language_data', 'lang_id'));
    }
    public function disclaimer_edit_submit(Request $request){
        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required',
        ]);
        $disclaimer_status = $request->disclaimer_status == 'Show' ? 'Show' : 'Hide';
        $disclaimer_single = Page::where('language_id',$request->lang_id)->first();
        if($disclaimer_single){
            $disclaimer_update = Page::find($disclaimer_single->id);
            $disclaimer_update->disclaimer_title = $request->disclaimer_title;
            $disclaimer_update->disclaimer_detail= $request->disclaimer_detail;
            $disclaimer_update->disclaimer_status= $disclaimer_status;
            $disclaimer_update->update();
        }else{
            $disclaimer = new Page();
            $disclaimer->disclaimer_title = $request->disclaimer_title;
            $disclaimer->disclaimer_detail= $request->disclaimer_detail;
            $disclaimer->disclaimer_status= $disclaimer_status;
            $disclaimer->language_id= $request->lang_id;
            $disclaimer->save();
        }
        if($request->lang_id){
            return redirect()->route('admin_page_disclaimer_lang', $request->lang_id)->with('success', 'Data is updated successfully');
        }
        return redirect()->route('admin_page_disclaimer')->with('success', 'Data is updated successfully');
    }
    // disclaimer end
}
