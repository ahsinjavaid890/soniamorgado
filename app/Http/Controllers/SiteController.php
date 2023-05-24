<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use App\Models\jobs;
use App\Models\User;
use App\Models\jobsubmissionsrequests;
use App\Models\linktemplatewithjobs;
use App\Models\maplocations;
use App\Models\wp_dh_products;
use App\Models\wp_dh_insurance_plans;
use App\Models\wp_dh_insurance_plans_rates;
use App\Models\blogs;
use App\Models\blogcategories;
use App\Models\contactus_messages; 
use App\Models\newsletter; 
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Session;
use Auth;
class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.homepage.index');
    }
    public function services()
    {
        return view('frontend.services.index');
    }
    
    public function blogdetail($id)
    {
        $data = blogs::where('url' , $id)->first();
        return view('frontend.companypages.blogdetails')->with(array('data'=>$data));
    }
    public function blogbycategory($id)
    {
        $category = blogcategories::where('url' , $id)->first();
        $data = DB::table('blogs')->where('category_id' , $category->id)->paginate(9);
        return view('frontend.companypages.blogsbycategory')->with(array('data'=>$data,'category'=>$category));
    }
    
    public function aboutus()
    {
        return view('frontend.companypages.about');
    }
    public function blogs()
    {
        $data = DB::table('blogs')->paginate(9);
        return view('frontend.companypages.blogs')->with(array('data'=>$data));
    }
    public function contactus()
    {
        return view('frontend.companypages.contact');
    } 
    public function contacts(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);

        $insert = new contactus_messages();
        $insert->fname = $request->fname;
        $insert->lname = $request->lname;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->subject = $request->subject; 
        $insert->description = $request->description;
        $insert->save();
        return redirect()->back()->with('message', 'Your Query Submited Successfully We Will Contact You With In 24 Hours');
    }
    public function privacypolicy()
    {
        return view('frontend.companypages.privacypolicy');
    }
    public function faq()
    {
        return view('frontend.companypages.faq');
    }
    
    public function termsandcondition()
    {
        return view('frontend.companypages.termsandcondition');
    }
    
    public function newsletter(Request $request)
    {
       $validated = $request->validate([
        'email' => 'required|email|max:255,',
        ]);
        $email = DB::table('news_letters')->where('email','=',$request->email)->first();
       if($email == null)
       {
           $data  = new NewsLetter();
           $data->email = $request->email;
           $data->save();
           return back()->with('message','Email saved succesfully');
       }
       return back()->with('error','Email Already Exist');
    }
    public function viewLetters()
    {   
        $users = DB::table('news_letters')->select('id','email')->get();
        return view('admin/contact/newsletter',compact('users'));
    }
    public function deleteletters($id)
    {
        DB::table('news_letters')->where('id' , $id)->delete();
        return redirect()->back()->with('message', 'Letter Deleted Successfully');
    }
}


