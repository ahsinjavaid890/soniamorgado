<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Helpers\Cmf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Models\companies;
use App\Models\services;
use App\Models\blogs;
use App\Models\blogcategories;
use App\Models\quotes;
use Illuminate\Support\Facades\Hash;
use Mail;
use Auth;
use DB;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin/dashboard/index');
    }
    public function editproduct($id)
    {
        $data = wp_dh_products::where('pro_id' , $id)->first();
        $pro_fields = unserialize($data->pro_fields);
        $pro_sort  = unserialize($data->pro_sort);
        return view('admin.products.editproduct')->with(array('pro_sort'=>$pro_sort,'data'=>$data,'pro_fields'=>$pro_fields));
    }
    public function updateproducts(Request $request)
    {
        $category_id = $request->category_id;
        $pro_name = $request->pro_name;
        $pro_parent = $request->pro_parent;
        $pro_supervisa = $request->pro_supervisa;
        $pro_life = $request->pro_life;
        $pro_travel_destination = $request->destinationtype;
        $pro_url = $request->pro_url;
        $redirect_from_url = $request->redirect_from_url;

        $prod_fields = serialize($request->prod);
        $sort_orders = array();
        $i = 1;
        // print_r($request->sort);exit;
        foreach($request->sort as  $order)
        {
            $sort_orders[$i] = $order;
            $i++;
        }
        // print_r($sort_orders);exit;
        $sort_orders =  serialize($sort_orders);



        if($request->vector)
        {
            $vector = Cmf::sendimagetodirectory($request->vector);
            DB::statement("UPDATE `wp_dh_products` SET `vector`='$vector',`description`='$request->description',`category_id`='$category_id',`pro_name`='$pro_name',`pro_parent`='$pro_parent',`pro_supervisa`='$pro_supervisa',`pro_life`='$pro_life',`pro_fields`='$prod_fields',`pro_sort`='$sort_orders',`pro_travel_destination`='$pro_travel_destination',`pro_url`='$pro_url', `redirect_from_url`='$redirect_from_url' WHERE `pro_id`='$request->id'");
        }else{
            DB::statement("UPDATE `wp_dh_products` SET `description`='$request->description',`category_id`='$category_id',`pro_name`='$pro_name',`pro_parent`='$pro_parent',`pro_supervisa`='$pro_supervisa',`pro_life`='$pro_life',`pro_fields`='$prod_fields',`pro_sort`='$sort_orders',`pro_travel_destination`='$pro_travel_destination',`pro_url`='$pro_url', `redirect_from_url`='$redirect_from_url' WHERE `pro_id`='$request->id'");
        }


        
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }


    public function addnewproducts(Request $request)
    {
        $new  = new services;
        $new->name = $request->name;
        $new->url = cmf::shorten_url($request->name);
        $new->image = cmf::sendimagetodirectory($request->image);
        $new->save();
        return redirect()->back()->with('message', 'Service Inserted Successfully');
    }


    public function addservice()
    {
        return view('admin.services.addnewproduct');
    }
    public function productcategories()
    {
        $data = product_categories::all();
        return view('admin.products.categories')->with(array('data'=>$data));
    }
    public function createproductcategory(Request $request)
    {
        $add = new product_categories();
        $add->name = $request->name;
        $add->description = $request->description;
        $add->vector = Cmf::sendimagetodirectory($request->vector);
        $add->show_on = $request->show_on;
        $add->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function updatproductcategory(Request $request)
    {
        $add = product_categories::find($request->id);
        $add->name = $request->name;
        $add->description = $request->description;
        if($request->vector)
        {
            $add->vector = Cmf::sendimagetodirectory($request->vector);
        }
        $add->show_on = $request->show_on;
        $add->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function addnewuser()
    {
        return view('admin.users.addnewuser');
    }
    public function edituser($id)
    {
        $data = DB::table('users')->where('id' , $id)->first();
        return view('admin.users.edituser')->with(array('data'=>$data));
    }
    public function memberdocument()
    {
        return view('admin.document.member-document');
    }
    public function docreport()
    {
        return view('admin.document.docreport');
    }
    public function expiredocs()
    {
        return view('admin.document.expiredocs');
    }
    public function allusers()
    {
        $data = User::all();
        return view('admin.users.allusers')->with(array('data'=>$data));
    }
    public function viewuser($id)
    {
        $data = User::find($id);
        return view('admin.users.viewuser')->with(array('data'=>$data));
    }
    public function allquotations()
    {
        $data = quotes::all();
        return view('admin/quotations/index')->with(array('data'=>$data));
    }
    public function messages()
    {   
        $data = DB::table('contactus_messages')->orderby('created_at' , 'desc')->paginate(10);
        return view('admin/contact/messages')->with(array('data'=>$data));
    }
    public function viewmessage($id)
    {
        $data = DB::table('contactus_messages')->where('id' , $id)->first();
        return view('admin/contact/viewmessage')->with(array('data'=>$data));
    }
    public function deletemessage($id)
    {
        DB::table('contactus_messages')->where('id' , $id)->delete();
        return redirect()->back()->with('message', 'Message Deleted Successfully');
    }

    public function allservices()
    {
        $data = services::all();
        return view('admin.services.index')->with(array('data'=>$data));
    }
    public function profile()
    {
        return view('admin/profile/index');
    }

    public function updateusers(Request $request)
    {
        

        $update = User::find($request->id);
        $update->name = $request->fname.' '.$request->lname;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->dob = $request->dob; 
        $update->about_me = $request->about_me;
        $update->username = $request->username;
        $update->password = Hash::make($request->password);
        if($request->logo)
        {
            $update->logo = Cmf::sendimagetodirectory($request->logo);
        }
        $update->address = $request->address;
        $update->province = $request->province;
        $update->city = $request->city;
        $update->country = $request->country;
        $update->postal = $request->postal;
        $update->user_type = $request->user_type;
        $update->parent_id = $request->parent_id;
        $update->status = $request->status;
        $update->mg_capability = $request->mg_capability;
        $update->fiscal_year = $request->fiscal_year;
        $update->save();
        return redirect()->back()->with('message', 'User Updated Successfully');
    }
    public function addnewusers(Request $request)
    {
        

        $update = new User;
        $update->name = $request->fname.' '.$request->lname;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->dob = $request->dob; 
        $update->about_me = $request->about_me;
        $update->username = $request->username;
        if($request->password){

            $update->password = Hash::make($request->password);
        }
        if($request->logo)
        {
            $update->logo = Cmf::sendimagetodirectory($request->logo);
        }
        $update->address = $request->address;
        $update->province = $request->province;
        $update->city = $request->city;
        $update->country = $request->country;
        $update->postal = $request->postal;
        $update->user_type = $request->user_type;
        $update->parent_id = $request->parent_id;
        $update->status = $request->status;
        $update->mg_capability = $request->mg_capability;
        $update->fiscal_year = $request->fiscal_year;
        $update->save();
        return redirect()->back()->with('message', 'User Updated Successfully');
    }
    public function updateuserprofile(Request $request)
    {
        $update = User::find(Auth::user()->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phonenumber = $request->phonenumber;
        $update->about_me = $request->about;
        if($request->profileimage)
        {
            $update->profileimage = Cmf::sendimagetodirectory($request->profileimage);
        }
        $update->save();
        return redirect()->back()->with('message', 'Your Profile Updated Successfully');
    }
    public function updateusersecurity(Request $request)
    {
        $this->validate($request, [
        'oldpassword' => 'required',
        'newpassword' => 'required',
        ]);
        if($request->newpassword == $request->password_confirmed){
        $hashedPassword = Auth::user()->password;
       if (\Hash::check($request->oldpassword , $hashedPassword )) {
         if (!\Hash::check($request->newpassword , $hashedPassword)) {
              $users =User::find(Auth::user()->id);
              $users->password = bcrypt($request->newpassword);
              User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
              session()->flash('message','password updated successfully');
              return redirect()->back();
            }
            else{
                  session()->flash('errorsecurity','New password can not be the old password!');
                  return redirect()->back();
                }
           }
          else{
               session()->flash('errorsecurity','Old password Doesnt matched ');
               return redirect()->back();
             }
        }else{
            session()->flash('errorsecurity','Repeat password Doesnt matched With New Password');
            return redirect()->back();
        }
    }
    public function allsale()
    {
        $data = DB::table('sales')->orderby('purchase_date' , 'DESC')->paginate(10);
        return view('admin.sales.allsale')->with(array('data'=>$data));
    }
    public function editsale($id)
    {
        $data = DB::table('sales')->where('sales_id' , $id)->first();
        return view('admin.sales.editsale')->with(array('data'=>$data));
    }
    public function editsales(Request $request)
    {
        $update = array('fname' => $request->fname, 'lname' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'dob' => $request->dob, 'address' => $request->address, 'address_2' => $request->address_2, 'province' => $request->province, 'city' => $request->city, 'postcode' => $request->postcode, 'country' => $request->country, 'home_address' => $request->home_address, 'home_address_2' => $request->home_address_2, 'home_province' => $request->home_province, 'home_city' => $request->home_city, 'home_zip' => $request->home_zip, 'home_country' => $request->home_country);

        DB::table('sales')->where('sales_id' , $request->id)->update($update);

        return redirect()->back()->with('message', 'Sales Updated Successfully');
    }
    public function viewsale($id)
    {
        $data = DB::table('sales')->where('sales_id' , $id)->first();
        $insurance_plan = wp_dh_insurance_plans::where('id'  ,$data->policy_id)->first();
        $company = wp_dh_companies::where('comp_id' , $insurance_plan->insurance_company)->first();
        return view('admin.sales.viewsale')->with(array('data'=>$data,'insurance_plan'=>$insurance_plan,'company'=>$company));
    }
    public function allcompanies()
    {
        $data = DB::table('wp_dh_companies')->get();
        return view('admin.companies.all')->with(array('data'=>$data));
    }



    public function blogcategories()
    {
        $data = DB::table('blogcategories')->get();
        return view('admin.blogs.categories')->with(array('data'=>$data));
    }
    public function deleteblogcategory($id)
    {
        blogs::where('category_id' , $id)->delete();
        blogcategories::where('id' ,$id)->delete();
        return redirect()->back()->with('message', 'Blog Category Deleted Successfully');
    }
    public function allblogs()
    {
        $data = DB::table('blogs')->get();
        $categories = blogcategories::all();
        return view('admin.blogs.addblog')->with(array('data'=>$data,'categories'=>$categories));
    }
    public function addnewblogcategory(Request $request)
    {
        $saveblog = new blogcategories;
        $saveblog->name = $request->name;
        $saveblog->status = 1;
        $saveblog->url = Cmf::shorten_url($request->name);
        $saveblog->save();
        return redirect()->back()->with('message', 'Blog Category Successfully Inserted');
        
    }
    public function updatblogcategory(Request $request)
    {
        $saveblog = blogcategories::find($request->id);
        $saveblog->name = $request->name;
        $saveblog->status = $request->status;
        $saveblog->url = Cmf::shorten_url($request->name);
        $saveblog->save();
        return redirect()->back()->with('message', 'Blog Category Updated Successfully');
    }
    public function createblog(Request $request)
    {
        $add = new blogs();
        $add->category_id = $request->category_id;
        $add->title = $request->title;
        $add->url = Cmf::shorten_url($request->title);
        $add->content = $request->content;
        $add->image = Cmf::sendimagetodirectory($request->image);
        $add->save();
        return redirect()->back()->with('message', 'Blog Added Successfully');        
    }
    public function updateblog(Request $request)
    {
        $add = blogs::find($request->id);
        $add->category_id = $request->category_id;
        $add->title = $request->title;
        $add->url = Cmf::shorten_url($request->title);
        $add->content = $request->content;
        if($request->image)
        {
            $add->image = Cmf::sendimagetodirectory($request->image);
        }
        $add->save();
        return redirect()->back()->with('message', 'Blog Updated Successfully');        
    }
    public function deleteblog($id)
    {
        blogs::where('id' , $id)->delete();
        return redirect()->back()->with('message', 'Blog Deleted Successfully');
    }
    public function websitesettings()
    {
        return view('admin.website.settings');
    }
    public function updatecompanyinfo(Request $request)
    {
        $data = wp_dh_companies::find($request->id);

        print_r($data);
    }
}
