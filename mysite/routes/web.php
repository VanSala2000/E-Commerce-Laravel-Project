<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('login','login')->name('login');
Route::view('register','register')->name('register');
Route::view('dashboard','dashboard')->name('dashboard');
Route::view('orderdetails','orderdetails')->name('orderdetails');


Route::middleware(['guest'])->group (function(){

Route::get('/admin',[AdminController::class,'adminlogin'])->name('admin');
Route::post('/adminvalidate',[AdminController::class,'adminvalidate'])->name('adminvalidate');


Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/registervalidate',[UserController::class,'registervalidate'])->name('registervalidate');
Route::post('/loginvalidate',[UserController::class,'loginvalidate'])->name('loginvalidate');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::get('/welcome',[UserController::class,'welcome'])->name('welcome');

Route::get('/forgotpass',[ResetPasswordController::class,'forgotpass'])->name('forgotpass');
Route::post('/forgotpass',[ResetPasswordController::class,'forgotpassverify'])->name('forgotpass.post');

Route::get('/reset-password/{token}',[ResetPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/reset-password',[ResetPasswordController::class,'resetPasswordPost'])->name('reset.password.post');

});

Route::middleware(['auth.session'])->group (function(){

Route::get('/admin.dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/clientorder',[AdminController::class,'clientorder'])->name('clientorder');

Route::get('/admin.delete',[AdminController::class,'delete'])->name('admin.delete');
Route::get('/deleteorder/{id}',[AdminController::class,'deleteorder']);

Route::get('/admin.addproduct',[AdminController::class,'product'])->name('admin.addproduct');
Route::post('/addproduct',[AdminController::class,'addproduct']);

Route::get('/admin.editproduct',[AdminController::class,'edproduct'])->name('admin.editproduct');
Route::get('updateproduct/{id}',[AdminController::class,'updateproduct']);
Route::put('update-item/{id}', [AdminController::class,'update']);

Route::get('/adminlogout',[AdminController::class,'adminlogout'])->name('adminlogout');

});

Route::middleware(['auth'])->group (function(){



    Route::get('/dashboard',[OrderController::class,'categories'])->name('dashboard');
    Route::get('view-dashboard/{category}',[OrderController::class,'viewdashboard']);
    Route::get('view-dashboard/{cate_cate}/{prod_title}',[OrderController::class,'productview']);
    
    Route::post('/addcart/{id}',[CartController::class,'addcart']);
    
    Route::get('/cart',[CartController::class,'showcart'])->name('cart');
    Route::get('/delete/{id}',[CartController::class,'deletecart']);

    Route::get('/remove/{id}',[CartController::class,'removecart']);
    
    Route::post('/order',[CartController::class,'confirmorder'])->name('order');
    Route::get('/orderdetails',[CartController::class,'orderdetails']);
    
    
    Route::get('/profile',[UserController::class,'userprofile'])->name('profile');
    Route::get('/changepass',[UserController::class,'passwordChange'])->name('changepass');
    Route::post('/changepass',[UserController::class,'passwordConfirm'])->name('changepass');

    Route::get('edit/{id}',[UserController::class,'editProfile']);
    Route::put('update-profile/{id}', [UserController::class,'update']);

    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});
