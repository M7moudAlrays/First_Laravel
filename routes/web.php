<?php

use App\Http\Controllers\auth\CustomAuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferController2;
use App\Http\Controllers\relations\RelationsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by tphp artisan route:clear
he RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('Pagination_Count',2) ;

Route::get('/', function () {
    return view('welcome') ;
});
Route::get('usermail', function () {
    return view('mails.usermail')  ;
});


Route::get('portfolio', function () {
    return view('BOOTSTRAP Design.portfolio')  ;
});
Route::get('aboutus', function () {
    return view('BOOTSTRAP Design.about')  ;
});
Route::get('contact', function () {
    return view('BOOTSTRAP Design.contact')  ;
});

Auth::routes(['verify'=>true]);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 
     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () 
    {
        Route::get('test', function ()
        {
        return view('test')  ;
        });
    });


// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ],function() 
//     {

        Route::group(['prefix' => 'offers'], function () 
        {
            Route::get('index' ,[OfferController::class ,'getoffers'])->name('showoffers') ;
            Route::get('insert' ,[OfferController::class ,'insertoffers'])->name('addoffer');
            Route::post('store' ,[OfferController::class ,'storeoffers'])->name('store'); 
            Route::get('edit/{id}' ,[OfferController::class , 'editoffers'])->name('edit');
            Route::post('update/{id}' ,[OfferController::class ,'updateoffers'])->name('update'); 
            Route::get('delete/{id}',[OfferController::class ,'deleteoffer'])->name('delete');
            Route::get('pagination',[OfferController::class ,'getoffersbypagination'])->name('getpagination');
            Route::get('show-Not-Activated' ,[OfferController::class ,'getOffersNotActivated'])->name('ShowNotActivated');

               
        }) ;  
    // });

Route::get('viewers',[CrudController::class , 'getViewers'])->Middleware("auth");


// ########################## ajax-offers  #########################
Route::group (['prefix' => 'ajax-offers'] , function () 
{
    Route::get('show' , [OfferController2::class ,'showbyajax'])->name('ajax.show') ;
    Route::get('create', [OfferController2 ::class , 'create'])->name('ajax.create') ;
    Route::post('add', [OfferController2::class , 'storebyajax'])->name('ajax.offers.store') ;
    Route::get('edit/{id}',[OfferController2::class ,'ajaxedit']) ->name('ajax-edit');
    Route::post('update',[OfferController2::class ,'ajaxupdate']) ->name('ajax.offers.update');
    Route::get('delete',[OfferController2::class ,'ajaxdelete'])->name('ajax-delete');
});


Route::group(['middleware' => 'checkAge'],function()
{    
    Route::get('adultsPage',[CustomAuthController::class , 'adualts']) ;
});

Route::get('notallowed', [CustomAuthController::class , 'notAllowed']) ;

############################ Begin Authintications & Guards ############################

Route::get('admin' , [CustomAuthController::class , 'admin'])->middleware('auth:admin') ;
Route::get('user' , [CustomAuthController::class , 'user'])->middleware('auth:web') ;

Route::get('admin-login' , [CustomAuthController::class ,'adminLogin']) ;
Route::post('save-login' , [CustomAuthController::class ,'checkAdminLogin'])->name('save-log') ;

########################### End Authintications & Guards ###############################


############################ Begin One To One Relations Routes #########################
Route::get('has-one' ,[RelationsController::class , 'hasOneRelation']) ;
Route::get('has-one-Reverse' ,[RelationsController::class , 'hasOneRelationreverse']) ;
Route::get('users-has-phone' ,[RelationsController::class , 'usersHasPhone']) ;
Route::get('users-No-Phone' ,[RelationsController::class , 'usersNotPhone']) ;
########################### End One To One Relations Routes #############################


############################ Begin One To Many Relations Routes #########################
Route::get('get-all-hospitals' ,[RelationsController::class , 'hospitals'])-> name('hospital.all');
Route::get('doctors-in-hospital' ,[RelationsController::class , 'getDoctors']) ;
Route::get('get-doctors-inhospital/{hospital_id}' ,[RelationsController::class , 'doctors'])-> name('hospital.doctors');
Route::get('hospitals-has-doctors',[RelationsController::class,'hospitalsHasDoctor']) ;
Route::get('has-male-doctors',[RelationsController::class,'HasMalesDoctor']) ;
Route::get('hasnot_doctors',[RelationsController::class,'hasnotDoctors']) ;
Route::get('hospital-delete/{id}',[RelationsController::class,'deleteHospital']);
########################### End One To Many Relations Routes #############################


################## Begin  Many To many Relationship #####################
Route::get('doctors-services', [RelationsController::class , 'DoctorServices']);
Route::get('services-doc', [RelationsController::class , 'ServiceDoctors']);
Route::get('servecies-doc/{doc_id}', [RelationsController::class , 'getDoctorServicesById'])->name('get_servecies');
Route::post('save-servecies-doc', [RelationsController::class , 'saveServices'])->name('save.services');
################## End Many To many Relationship #####################

################## Begin has one through Relationship #####################
Route::get('doctor-for-patient', [RelationsController::class , 'getPatientProfile']);
Route::get('doctors-by-country', [RelationsController::class , 'getdoctorsbycountry']);
################## End has one through Relationship #####################

########################### Begin Accessors And Mutators ##############################
Route::get('accessors', [RelationsController::class , 'getdoctorsbyaccessors']);


########################### End Accessors And Mutators ##############################

























    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale(),
    //         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //     ], function()
    //     {
    //         Route::group(
    //             [
    //                 'prefix' => 'offers'
    //             ] , function () 
    //             {
    //                 Route::get('index',[OfferController::class ,'getoffers']) ;
    //                 Route::get('insert',[OfferController::class ,'insertoffers']);
    //                 Route::post('store', [OfferController::class ,'storeoffers']) ;   
    //             });
    //     });
        
