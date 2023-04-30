<?php


use App\Http\Controllers\Admin;
//use App\Http\Controllers\Admin\SisterConcerController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\EthicController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true,'register'=>false]);
Route::get('/',[FrontendController::class,'index']);
Route::post('/send-mail', [FrontendController::class,'sendMail'])->name('receive.mail');

Route::get('company-about/{slug}',[FrontendController::class,'page']);
//Route::get('company-info/{id}',[FrontendController::class,'companyCateProduct']);
Route::group(['middleware' => 'auth'], function () {
   // Route::get('/', [DashboardController::class,'index']);
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('/company', 'Admin\SisterConcernController', ['except' => ['show']]);
    Route::get('/banner/{banner?}', [BannerController::class,'create'])->name('banner');
    Route::post('/banner/{banner?}', [BannerController::class,'store'])->name('banner');
    Route::get('/about/{about?}', [AboutController::class,'create'])->name('about');
    Route::post('/about/{about?}', [AboutController::class,'store'])->name('about');
    Route::resource('/news', 'Admin\NewsController', ['except' => ['show']]);
    Route::resource('/service', 'Admin\ServiceController', ['except' => ['show']]);
    Route::resource('/client', 'Admin\ClientController', ['except' => ['show']]);
    Route::get('/ethic/{ethic?}', [EthicController::class,'create'])->name('ethic');
    Route::post('/ethic/{ethic?}', [EthicController::class,'store'])->name('ethic');
    Route::resource('/management', 'Admin\ManagementController', ['except' => ['show']]);
    Route::resource('/location', 'Admin\LocationController', ['except' => ['show']]);
    Route::get('/showroom/{showroom?}', [ShowroomController::class,'create'])->name('showroom');
    Route::post('/showroom/{showroom?}', [ShowroomController::class,'store'])->name('showroom');
    Route::resource('/category', 'Admin\CategoryController', ['except' => ['show']]);
    Route::resource('/why-choose', 'Admin\WhyChooseController', ['except' => ['show']]);
    Route::resource('/product', 'Admin\ProductController', ['except' => ['show']]);
    Route::post('/product/softdelete', [Admin\ProductController::class, 'softdelete']);

});
