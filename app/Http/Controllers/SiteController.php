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
    public function checkadditionaltravelers(Request $request)
    {
        foreach($request->ages as $r) {
            echo $r;
        }
    }
    public function sendcompareemail(Request $request)
    {
        Mail::send('email.compare', array('request'=>$request), function($message) use ($request) {
               $message->to($request->email)->subject
                  ('Comparisons of Insurance Plans');
            $message->from('compare@lifeadvice.ca','LIFEADVICE');
        });
        return redirect()->back()->with('message', 'success');
    }
    public function ajaxquotes(Request $request)
    {
        $quoteNumber = rand();
        $data = wp_dh_products::where('pro_id' , $request->product_id)->first();
        $fields = unserialize($data->pro_fields);
        $plan = DB::table('wp_dh_insurance_plans' , $data->pro_id)->first();
        $ded = DB::table('wp_dh_insurance_plans_deductibles')->where('plan_id', $plan->id)->groupby('deductible1')->get();
        $query = "CAST(`sum_insured` AS DECIMAL)";
        $sum = DB::table('wp_dh_insurance_plans_rates')->where('plan_id', $plan->id)->groupby('sum_insured')->orderByRaw($query)->get();
        $returnHTML =  view('frontend.formone.ajaxquotes')->with(array('quoteNumber'=>$quoteNumber,'data'=>$data,'fields'=>$fields,'ded'=>$ded,'sum'=>$sum,'request'=>$request))->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
    public function confermquote()
    {
        return view('frontend.formone.conferm');
    }
    public function applyqoute(Request $request)
    {
       $sql =  "INSERT INTO `sales`(`policy_id`, `policy_title`, `fname`, `lname`, `email`, `phone`, `address`, `address_2`, `city`, `postcode`, `country`, `billing_province`, `deductible`, `deductible_rate`, `benefit`, `duration`, `age`, `product`, `plan`, `dob`, `start_date`, `end_date`, `departure_date`, `arrival_date`, `return_date`, `additional_travellers`, `price_total`, `price_payable`, `broker`, `agent`, `user_id`) VALUES ('$request->plan_id','$request->plan_name','$request->fname','$request->lname','$request->email','$request->phone','$request->streetname','$request->suit','$request->city','$request->postalcode','CA','$request->province','$request->deductibles','$request->deductible_rate','$request->coverage','$request->tripduration','$request->age','$request->product_id','$request->plan_name','$request->dob','$request->tripdate','$request->tripend','$request->tripdate','$request->tripdate','$request->tripend','$request->traveller','$request->premium','$request->premium','$request->broker','$request->agent','0')";
        DB::statement($sql);
        $sales = DB::Table('sales')->limit(1)->orderBy('sales_id' , 'DESC')->first();
        $saleid = $sales->sales_id;
        $card_expiry = explode('/', $request->expirationdate);
        $card_month = $card_expiry[0];
        $card_year = $card_expiry[1];
        $sql2 = "INSERT INTO `sales_cards`(`card_name`, `card_number`, `card_month`, `card_year`, `card_cvc`, `sales_id`) VALUES ('$request->cardholdername','$request->cardholdernumber','$card_month','$card_year','$request->card_cvc','$saleid')";
        DB::statement($sql2);
        $sql3 = "INSERT INTO `sales_transactions`(`sales_id`, `payment_type`, `description`, `amount`) VALUES ('$saleid', 'payment', 'Policy Purchase Payment', '$request->premium')";
        DB::statement($sql3);
        if($sales->product == 1){
            $policytype = 'SVI';
        } else if($sales->product == 2){
            $policytype = 'VTC';
        } else if($sales->product == 3){
            $policytype = 'SI';
        } else if($sales->product == 4){
            $policytype = 'IFC';
        } else if($sales->product == 5){
            $policytype = 'ST';
        } else if($sales->product == 6){
            $policytype = 'MT';
        } else if($sales->product == 7){
            $policytype = 'AI';
        } else if($sales->product == 8){
            $policytype = 'TII';
        } else if($sales->product == 9){
            $policytype = 'BC';
        }else{
            $policytype = '';
        }
        $policy_number_temp = 10000000 + $sales->sales_id;
        $policy_number = $policytype.$policy_number_temp;
        $checkuser = User::where('email' , $request->email)->count();
        if($checkuser == 0)
        {
            $password = $policy_number;
            $newuser = new User();
            $newuser->name = $request->fname.' '.$request->lname;
            $newuser->email = $request->email;
            $newuser->phone = $request->phone;
            $newuser->dob = $request->dob;
            $newuser->address = $request->streetname;
            $newuser->country = 'CA';
            $newuser->postal = $request->postalcode; 
            $newuser->password = Hash::make($password);
            $newuser->user_type = 'customer';
            $newuser->status = 'active';
            $newuser->save();
        }else{
            $user = User::where('email' , $request->email)->first();
            $password = $policy_number;
            $newuser = User::find($user->id);
            $newuser->password = Hash::make($password);
            $newuser->save();
        }
        $subject = 'Your Life Advice Policy Confirmation | '.$policy_number;
        Mail::send('email.purchasepolicy', ['request' => $request,'sale' => $sales], function($message) use($request , $subject){
              $message->to($request->email);
              $message->subject($subject);
        });
        return view('frontend.formone.conferm')->with(array('request'=>$request));
    }
    public function applyplan(Request $request)
    {
        return view('frontend.formone.apply')->with(array('request'=>$request));
    }
    public function compareplans(Request $request)
    {
        return view('frontend.formone.compare')->with(array('request'=>$request));
    }
    public function productdetail($id)
    {
        $data = wp_dh_products::where('url' , $id)->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $sortfields = unserialize($data->pro_sort);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = DB::select("SELECT `sum_insured` FROM `wp_dh_insurance_plans_rates` WHERE `plan_id` IN (SELECT `id` FROM `wp_dh_insurance_plans` WHERE `product`='$data->pro_id') GROUP BY `sum_insured` ORDER BY CAST(`sum_insured` AS DECIMAL)");
            return view('frontend.formone.index')->with(array('data'=>$data,'orderdata'=>$sortfields,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function quotes(Request $request)
    {
        $quoteNumber = rand();
        $data = wp_dh_products::where('pro_id' , $request->product_id)->first();
        $fields = unserialize($data->pro_fields);
        $plan = DB::table('wp_dh_insurance_plans' , $data->pro_id)->first();
        $ded = DB::table('wp_dh_insurance_plans_deductibles')->where('plan_id', $plan->id)->groupby('deductible1')->get();
        $query = "CAST(`sum_insured` AS DECIMAL)";
        $sum = DB::table('wp_dh_insurance_plans_rates')->where('plan_id', $plan->id)->groupby('sum_insured')->orderByRaw($query)->get();
        return view('frontend.formone.quote')->with(array('quoteNumber'=>$quoteNumber,'data'=>$data,'fields'=>$fields,'ded'=>$ded,'sum'=>$sum,'request'=>$request));
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
    public function supervisa()
    {

        $data = wp_dh_products::where('url' , 'super-visa-insurance')->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = wp_dh_insurance_plans_rates::select('wp_dh_insurance_plans_rates.sum_insured')->whereIn('plan_id' , $wp_dh_insurance_plans)->groupby('sum_insured')->get();
            return view('frontend.companypages.supervisa')->with(array('data'=>$data,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function travel()
    {
        $data = wp_dh_products::where('url' , 'travel-insurance')->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = wp_dh_insurance_plans_rates::select('wp_dh_insurance_plans_rates.sum_insured')->whereIn('plan_id' , $wp_dh_insurance_plans)->groupby('sum_insured')->get();
            return view('frontend.companypages.travel')->with(array('data'=>$data,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function singletripinsurance()
    {
        $data = wp_dh_products::where('url' , 'single-trip-insurance')->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = wp_dh_insurance_plans_rates::select('wp_dh_insurance_plans_rates.sum_insured')->whereIn('plan_id' , $wp_dh_insurance_plans)->groupby('sum_insured')->get();
            return view('frontend.companypages.singletripinsurance')->with(array('data'=>$data,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function visitorinsurance()
    {
        $data = wp_dh_products::where('url' , 'visitor-insurance')->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = DB::select("SELECT `sum_insured` FROM `wp_dh_insurance_plans_rates` WHERE `plan_id` IN (SELECT `id` FROM `wp_dh_insurance_plans` WHERE `product`='$data->pro_id') GROUP BY `sum_insured` ORDER BY CAST(`sum_insured` AS DECIMAL)");
            return view('frontend.companypages.visitorinsurance')->with(array('data'=>$data,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function studentinsurance()
    {
         $data = wp_dh_products::where('url' , 'student-insurance')->first();
        if($data)
        {
            $fields = unserialize($data->pro_fields);
            $wp_dh_insurance_plans = wp_dh_insurance_plans::select('wp_dh_insurance_plans.id')->where('product' , $data->pro_id)->get();
            $sum_insured = wp_dh_insurance_plans_rates::select('wp_dh_insurance_plans_rates.sum_insured')->whereIn('plan_id' , $wp_dh_insurance_plans)->groupby('sum_insured')->get();
            return view('frontend.companypages.studentinsurance')->with(array('data'=>$data,'fields'=>$fields,'sum_insured'=>$sum_insured));
        }
        else
        {
            return response()->view('frontend.errors.404', [], 404);
        }
    }
    public function lifeinsurance()
    {
        return view('frontend.companypages.life-insurance');
    }
    public function desability()
    {
        return view('frontend.companypages.desability');
    }
    public function criticalillness()
    {
        return view('frontend.companypages.critical-illness');
    }
    public function health()
    {
        return view('frontend.companypages.health-insurance');
    }
    public function product()
    {
        return view('frontend.companypages.product');
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
    public function claim()
    {
        return view('frontend.companypages.claim');
    }
    public function resp()
    {
        return view('frontend.companypages.resp');
    }
    public function rrsp()
    {
        return view('frontend.companypages.rrsp');
    }
    public function mortgage()
    {
        return view('frontend.companypages.mortgage');
    }
    public function termsandcondition()
    {
        return view('frontend.companypages.termsandcondition');
    }
    public function termlifeinsurance()
    {
        return view('frontend.companypages.termlifeinsurance');
    }
    public function tfsa()
    {
        return view('frontend.companypages.tfsa');
    }
    public function nonmedical()
    {
        return view('frontend.companypages.nonmedical');
    }
    public function login()
    {
        if(Auth::check())
        {
            return redirect()->route('user.dashboard');   
        }else{
            return view('auth.login');
        }
        
    }
    public function attemptlogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {   
            if(Auth::user()->user_type == 'customer')
            {
                if (Auth::user()->status == 'active') {
                    return redirect()->route('user.dashboard');   
                }else{
                    Auth::logout();
                    return redirect()->back()->with('warning', 'Your Account Is Banned Due To Some Reason');
                }
            }
            else
            {
                Auth::logout();
                return redirect()->back()->with('warning', 'This Is for Customers.');
            }
        }
        else
        {
            return redirect()->back()->with('warning', 'Email or Password are Incorrect');
        }
    }
    public function signup()
    {
        return view('frontend.companypages.signup');
    }
    public function carrierprofile($id)
    {
        $data = companies::where('company_link' , $id)->get()->first();
        $jobs = jobsubmissionsrequests::select('jobs.url','jobs.id as job_id','jobs.job_tittle','jobs.duty_time','jobs.freight_type','jobs.home_time','jobs.avgerage_weekly_pay')->leftJoin('jobs','jobs.id','=','jobsubmissionsrequests.job_id')->get();
        foreach ($jobs as $index => $job) {
            $job->hirring = linktemplatewithjobs::select('linktemplatewithjobs.job_id','hiring_templates.minimum_expereince')->leftJoin('hiring_templates','hiring_templates.id','=','linktemplatewithjobs.template_id')->where('linktemplatewithjobs.job_id' , $job->job_id)->first();
        }
        return view('frontend.carrier.index')->with(array('data'=>$data,'jobs'=>$jobs));
    }
    public function jobdetail($id)
    {   
        $jobs = jobsubmissionsrequests::select('jobs.hiring_area','jobs.operating_area','jobs.company_id','jobs.url','jobs.id as job_id','jobs.job_tittle','jobs.duty_time','jobs.freight_type','jobs.home_time','jobs.avgerage_weekly_pay')->leftJoin('jobs','jobs.id','=','jobsubmissionsrequests.job_id')->where('jobs.url' , $id)->get()->first();
        $hirring = linktemplatewithjobs::select(
            'linktemplatewithjobs.job_id',
            'hiring_templates.minimum_expereince',
            'hiring_templates.minimum_age',
            'hiring_templates.moving_violations',
            'hiring_templates.license_suspensions',
            'hiring_templates.license_suspensions_field',
            'hiring_templates.dot_moving_voilations',
            'hiring_templates.moving_voilations_incidents',
            'hiring_templates.maximum_jobs_no_more_than',
            'hiring_templates.felony_convictions',
            'hiring_templates.misdemeanors',
            'hiring_templates.moving_violations',
            'hiring_templates.moving_violations',
            'hiring_templates.moving_violations',
            'hiring_templates.moving_violations',
            'hiring_templates.moving_violations',
            'hiring_templates.moving_violations',
            'hiring_templates.minimum_age_field')->leftJoin('hiring_templates','hiring_templates.id','=','linktemplatewithjobs.template_id')->where('linktemplatewithjobs.job_id' , $jobs->job_id)->first();
        $company = companies::where('id' , $jobs->company_id)->get()->first();
        return view('frontend.jobs.index')->with(array('data'=>$jobs,'company'=>$company,'hirring'=>$hirring));
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


