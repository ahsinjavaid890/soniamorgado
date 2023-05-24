<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StaffPermissionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\JobController; 
use App\Http\Controllers\GoogleController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
Route::POST('/attemptlogin', [SiteController::class, 'attemptlogin']);
Route::name('user.')->prefix('user')->group(function(){
    Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');
    
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Site Routes
Route::get('/', [SiteController::class, 'index']);
Route::get('/profile', [HomeController::class, 'dashboard']);
Route::get('/security-settings', [SiteController::class, 'securitysettings']);
Route::get('/policydetail/{id}', [HomeController::class, 'policydetail']);
Route::get('/udashboard', [SiteController::class, 'udashboard']);
Route::get('/qoutes-detail', [SiteController::class, 'qoutesdetail']);
Route::get('/super-visa-insurance', [SiteController::class, 'supervisa']);
Route::get('/travel-insurance', [SiteController::class, 'travel']);
Route::get('/single-trip-insurance', [SiteController::class, 'singletripinsurance']);
Route::get('/visitor-insurance', [SiteController::class, 'visitorinsurance']);
Route::get('/student-insurance', [SiteController::class, 'studentinsurance']);
Route::get('/sendcompareemail', [SiteController::class, 'sendcompareemail']);
Route::get('/terms-and-condition', [SiteController::class, 'termsandcondition']);
Route::get('/term-life-insurance', [SiteController::class, 'termlifeinsurance']);


Route::POST('slideadditionaltravelers', [SiteController::class, 'checkadditionaltravelers']);





Route::get('/life-insurance', [SiteController::class, 'lifeinsurance']);
Route::get('/desability', [SiteController::class, 'desability']);
Route::get('/critical-illness', [SiteController::class, 'criticalillness']);
Route::get('/health-insurance', [SiteController::class, 'health']);
Route::get('/product', [SiteController::class, 'product']);
Route::get('/claim', [SiteController::class, 'claim']);
Route::get('/resp', [SiteController::class, 'resp']);
Route::get('/rrsp', [SiteController::class, 'rrsp']);
Route::get('/mortgage', [SiteController::class, 'mortgage']);
Route::get('/tfsa', [SiteController::class, 'tfsa']);
Route::get('/nonmedical', [SiteController::class, 'nonmedical']);
Route::get('/aboutus', [SiteController::class, 'aboutus']);
Route::get('/contactus', [SiteController::class, 'contactus']);
Route::POST('/contactus', [SiteController::class, 'contacts']);
Route::get('/privacypolicy', [SiteController::class, 'privacypolicy']);
Route::get('/blogs', [SiteController::class, 'blogs']);
Route::get('/faq', [SiteController::class, 'faq']);
Route::get('/login', [SiteController::class, 'login']);
Route::post('/expertip',[SiteController::class , 'newsletter'])->name('news_letter');
Route::get('/all/newsletters',[SiteController::class , 'viewLetters'])->name('view_news');
Route::get('/delete/letters/{id}',[SiteController::class , 'deleteLetters'])->name('deletenews');
Route::get('/blog/{id}', [SiteController::class, 'blogdetail']);
Route::get('/category/{id}', [SiteController::class, 'blogbycategory']);
Route::get('/compareplans', [SiteController::class, 'compareplans']);
Route::POST('/apply', [SiteController::class, 'applyplan']);
Route::POST('/applyqoute', [SiteController::class, 'applyqoute']);
Route::get('/conferm', [SiteController::class, 'confermquote']);



Route::get('/product/{id}', [SiteController::class, 'productdetail']);


Route::POST('/quotes', [SiteController::class, 'quotes'])->name('quotes');
Route::POST('/ajaxquotes', [SiteController::class, 'ajaxquotes'])->name('ajaxquotes');





Route::get('/carrier/{id}', [SiteController::class, 'carrierprofile']);
Route::get('/job-detail/{id}', [SiteController::class, 'jobdetail']);



// Register Routes
Route::POST('/checkemail', [RegisterController::class, 'checkemail'])->name('checkemail');
Route::get('/checkcompanyname/{id}', [RegisterController::class, 'checkcompanyname']);
Route::get('/checkdotnumber/{id}', [RegisterController::class, 'checkdotnumber']);
Route::POST('/carrierregister', [RegisterController::class, 'carrierregister']);

Route::get('/registeralert', [RegisterController::class, 'registeralert'])->name('registeralert');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [CarrierController::class, 'index']);












Route::get('/carrier-profile/reviews', function () {
    return view('carrier/carrier-profile/reviews');
});








// Hiring Maps
Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/login',[LoginController::class, 'login'])->name('login');
    Route::post('/login-process',[LoginController::class, 'login_process'])->name('login_process');
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
});


Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('admin')->group(function(){
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/profile','AdminController@profile')->name('profile');
    Route::post('/updateuserprofile','AdminController@updateuserprofile');
    Route::post('/updateusersecurity','AdminController@updateusersecurity');

    Route::name('blogs.')->prefix('blogs')->group(function(){
        Route::get('/blogcategories','AdminController@blogcategories');
        Route::post('/addnewblogcategory','AdminController@addnewblogcategory');
        Route::post('/updatblogcategory','AdminController@updatblogcategory');
        Route::get('/deleteblogcategory/{id}','AdminController@deleteblogcategory');
        Route::get('/allblogs','AdminController@allblogs');
        Route::post('/addnewfaq','AdminController@addnewfaq');
        Route::post('/updateblog','AdminController@updateblog');
        Route::get('/deleteblog/{id}','AdminController@deleteblog');
    });
    Route::name('website.')->prefix('website')->group(function(){
        Route::get('/settings','SettingsController@appearance');
        Route::post('/settingsupdate','SettingsController@appearance_update');
        Route::post('/updatelogos','SettingsController@updatelogos');
    });
    Route::name('companies.')->prefix('companies')->group(function(){
        Route::get('/allcompanies','AdminController@allcompanies');
        Route::post('/updatecompanyinfo','AdminController@updatecompanyinfo');
    });
    Route::name('products.')->prefix('products')->group(function(){
        Route::get('/allproducts','AdminController@allproducts');
        Route::get('/addnewproduct','AdminController@addnewproduct');
        Route::post('/addnewproduct','AdminController@addnewproducts');
        Route::get('/edit/{id}','AdminController@editproduct');
        Route::post('/updateproducts','AdminController@updateproducts');
        Route::get('/productcategories','AdminController@productcategories');
        Route::post('/createproductcategory','AdminController@createproductcategory');
        Route::post('/updatproductcategory','AdminController@updatproductcategory');
    });
    Route::name('reports.')->prefix('reports')->group(function(){
        Route::get('/salesreport','Reportcontroller@salesreport');
        Route::get('/broker','Reportcontroller@brokercomission');
        Route::get('/agent','Reportcontroller@agentreport');
        Route::post('/getagentreport','Reportcontroller@agentreports');
    });
    Route::name('plans.')->prefix('plans')->group(function(){
        Route::get('/allplans','AdminController@allplans');
        Route::get('/editplan/{id}','AdminController@editplan');
        Route::get('/deleteplan/{id}','AdminController@deleteplan');
        Route::post('createnewplan','AdminController@createnewplan');
        Route::post('updateplan','AdminController@planupdate');
        Route::get('/addnewplan','AdminController@addnewplan');
        Route::get('/addlifeplane','AdminController@addlifeplane');
        Route::get('/planbenifits','AdminController@planbenifits');
        Route::get('/addnewplanbenifit','AdminController@addnewplanbenifit');
        Route::get('/lifeplans','AdminController@lifeplans');
        Route::get('/lifeplans','AdminController@lifeplans');
        Route::get('/planbenifitscategories','AdminController@planbenifitscategories');
        Route::post('addnewbenifitcategory','AdminController@addnewbenifitcategory');
        Route::post('updatbenifitcategory','AdminController@updatbenifitcategory');
        Route::get('/addlifeplanbenifit','AdminController@addlifeplanbenifit');
        Route::get('/editlifeplan/{id}','AdminController@editlifeplan');
        Route::get('/lifeplanbenifits','AdminController@lifeplanbenifits');
        Route::post('/createnewplanbenifit','AdminController@createnewplanbenifit');
        Route::post('/createlifeplanbenifit','AdminController@createlifeplanbenifit');
        Route::post('/updatelifeplanbenifit','AdminController@updatelifeplanbenifit'); 
        Route::post('/updateplanbenifit','AdminController@updateplanbenifit'); 
        Route::get('/editplanbenifit/{id}','AdminController@editplanbenifit');
        Route::get('/editlifeplanbenifit/{id}','AdminController@editlifeplanbenifit');
        Route::get('/deletelifeplanbenifit/{id}','AdminController@deletelifeplanbenifit');
        Route::get('/deleteplanbenifit/{id}','AdminController@deleteplanbenifit');
    });
    Route::name('quotation.')->prefix('quotation')->group(function(){
        Route::get('/allquotations','AdminController@allquotations');    
    });
    Route::name('contact.')->prefix('contact')->group(function(){
        Route::get('/messages','AdminController@messages');
        Route::get('/viewmessage/{id}','AdminController@viewmessage'); 
        Route::get('/deletemessage/{id}','AdminController@deletemessage');   
    });

    Route::name('users.')->prefix('users')->group(function(){
        Route::get('/allusers','AdminController@allusers');
        Route::get('/viewuser/{id}','AdminController@viewuser');
        Route::get('/addnewuser','AdminController@addnewuser');
        Route::get('/edituser/{id}','AdminController@edituser');
        Route::post('/addnewuser','AdminController@addnewusers');
        Route::post('/edituser','AdminController@updateusers');

    });
     Route::name('document.')->prefix('document')->group(function(){
        Route::get('/member-document','AdminController@memberdocument');
        Route::get('/docreport','AdminController@docreport');
        Route::get('/expiredocs','AdminController@expiredocs');

    });
    Route::name('pages.')->prefix('pages')->group(function(){
        Route::get('/travelpages/{id}','CmsController@travelpages');
        Route::post('/section_three_elements','CmsController@sectionthreeelements');
        Route::post('/updatedynamicpage','CmsController@updatedynamicpage');
        Route::post('/addnewsectionthreeelement','CmsController@addnewsectionthreeelement');
        Route::get('/dletesectiontwo/{id}','CmsController@dletesectiontwo');
        
    });


    Route::name('sales.')->prefix('sales')->group(function(){
        Route::get('/allsale','AdminController@allsale');
        Route::get('/editsale/{id}','AdminController@editsale');
        Route::post('/editsale','AdminController@editsales');
        Route::get('/viewsale/{id}','AdminController@viewsale');
    });

    Route::name('faq.')->prefix('faq')->group(function(){
        Route::get('/faqcategories','CmsController@faqcategories');
        Route::post('/addnewfaqcategory','CmsController@addnewfaqcategory');
        Route::post('/updatfaqcategory','CmsController@updatfaqcategory');
        Route::get('/deletefaqcategory/{id}','CmsController@deletefaqcategory');
        Route::get('/allfaq','CmsController@allfaq');
        Route::post('/addnewfaq','CmsController@addnewfaq');
        Route::post('/updatfaq','CmsController@updatfaq');
        Route::get('/deletefaq/{id}','CmsController@deletefaq');
    });




});