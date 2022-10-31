<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    // about start
    public function about(){
        $about_single = Page::select('about_title', 'about_detail','about_status')->first();
        $about_title = "";
        $about_detail = "";
        $about_status = "";
        if($about_single){
            $about_title = $about_single->about_title;
            $about_detail = $about_single->about_detail;
            $about_status = $about_single->about_status;
        }
        return view('admin.page.about.about_show', compact('about_title', 'about_detail', 'about_status'));
    }
    public function about_edit_submit(Request $request){
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required',
        ]);
        $about_status = $request->about_status == 'Show' ? 'Show' : 'Hide';
        $about_single = Page::first();
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
            $about->save();
        }
        return redirect()->route('admin_page_about')->with('success', 'Data is updated successfully');
    }
    // about end


    // faq start
    public function faq(){
        $faq_single = Page::select('faq_title', 'faq_detail','faq_status')->first();
        $faq_title = "";
        $faq_detail = "";
        $faq_status = "";
        if($faq_single){
            $faq_title = $faq_single->faq_title;
            // $faq_detail = $faq_single->faq_detail;
            $faq_status = $faq_single->faq_status;
        }
        return view('admin.page.faq.faq_show', compact('faq_title', 'faq_detail', 'faq_status'));
    }
    public function faq_edit_submit(Request $request){
        $request->validate([
            'faq_title' => 'required',
            // 'faq_detail' => 'required',
        ]);
        $faq_status = $request->faq_status == 'Show' ? 'Show' : 'Hide';
        $faq_single = Page::first();
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
            $faq->save();
        } 
        return redirect()->route('admin_page_faq')->with('success', 'Data is updated successfully');
    }
    // faq end

    // contact start
    public function contact(){
        $contact_single = Page::select('contact_title', 'contact_detail','contact_map','contact_status')->first();
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
        return view('admin.page.contact.contact_show', compact('contact_title', 'contact_detail', 'contact_status','contact_map'));
    }
    public function contact_edit_submit(Request $request){
        $request->validate([
            'contact_title' => 'required',
            'contact_detail' => 'required',
            'contact_map' => 'required',
        ]);
        $contact_status = $request->contact_status == 'Show' ? 'Show' : 'Hide';
        $contact_single = Page::first();
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
            $contact->save();
        }
        return redirect()->route('admin_page_contact')->with('success', 'Data is updated successfully');
    }
    // contact end

    // login start
    public function login(){
        $login_single = Page::select('login_title','login_status')->first();
        $login_title = "";
        $login_status = "";
        if($login_single){
            $login_title = $login_single->login_title;
            $login_status = $login_single->login_status;
        }
        return view('admin.page.login.login_show', compact('login_title', 'login_status'));
    }
    public function login_edit_submit(Request $request){
        $request->validate([
            'login_title' => 'required',
        ]);
        $login_status = $request->login_status == 'Show' ? 'Show' : 'Hide';
        $login_single = Page::first();
        if($login_single){
            $login_update = Page::find($login_single->id);
            $login_update->login_title = $request->login_title;
            $login_update->login_status= $login_status;
            $login_update->update();
        }else{
            $login = new Page();
            $login->login_title = $request->login_title;
            $login->login_status= $login_status;
            $login->save();
        }
        return redirect()->route('admin_page_login')->with('success', 'Data is updated successfully');
    }
    // login end

    // terms start
    public function terms(){
        $terms_single = Page::select('terms_title', 'terms_detail','terms_status')->first();
        $terms_title = "";
        $terms_detail = "";
        $terms_status = "";
        if($terms_single){
            $terms_title = $terms_single->terms_title;
            $terms_detail = $terms_single->terms_detail;
            $terms_status = $terms_single->terms_status;
        }
        return view('admin.page.terms.terms_show', compact('terms_title', 'terms_detail', 'terms_status'));
    }
    public function terms_edit_submit(Request $request){
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required',
        ]);
        $terms_status = $request->terms_status == 'Show' ? 'Show' : 'Hide';
        $terms_single = Page::first();
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
            $terms->save();
        }
        return redirect()->route('admin_page_terms')->with('success', 'Data is updated successfully');
    }
    // terms end

    // privacy start
    public function privacy(){
        $privacy_single = Page::select('privacy_title', 'privacy_detail','privacy_status')->first();
        $privacy_title = "";
        $privacy_detail = "";
        $privacy_status = "";
        if($privacy_single){
            $privacy_title = $privacy_single->privacy_title;
            $privacy_detail = $privacy_single->privacy_detail;
            $privacy_status = $privacy_single->privacy_status;
        }
        return view('admin.page.privacy.privacy_show', compact('privacy_title', 'privacy_detail', 'privacy_status'));
    }
    public function privacy_edit_submit(Request $request){
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required',
        ]);
        $privacy_status = $request->privacy_status == 'Show' ? 'Show' : 'Hide';
        $privacy_single = Page::first();
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
            $privacy->save();
        }
        return redirect()->route('admin_page_privacy')->with('success', 'Data is updated successfully');
    }
    // privacy end

    // disclaimer start
    public function disclaimer(){
        $disclaimer_single = Page::select('disclaimer_title', 'disclaimer_detail','disclaimer_status')->first();
        $disclaimer_title = "";
        $disclaimer_detail = "";
        $disclaimer_status = "";
        if($disclaimer_single){
            $disclaimer_title = $disclaimer_single->disclaimer_title;
            $disclaimer_detail = $disclaimer_single->disclaimer_detail;
            $disclaimer_status = $disclaimer_single->disclaimer_status;
        }
        return view('admin.page.disclaimer.disclaimer_show', compact('disclaimer_title', 'disclaimer_detail', 'disclaimer_status'));
    }
    public function disclaimer_edit_submit(Request $request){
        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required',
        ]);
        $disclaimer_status = $request->disclaimer_status == 'Show' ? 'Show' : 'Hide';
        $disclaimer_single = Page::first();
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
            $disclaimer->save();
        }
        return redirect()->route('admin_page_disclaimer')->with('success', 'Data is updated successfully');
    }
    // disclaimer end
}
