<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminEventsController;
use App\Http\Controllers\Admin\AdminInterestController;
use App\Http\Controllers\Admin\AdminUserInterestsController;


Route::get('/login', [AdminLoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [AdminLoginController::class,'login'])->name('login')->middleware('guest');


Route::get('/', [AdminHomeController::class,'index'])->middleware('auth')->name('admin_home');
Route::post('/add_user', [AdminHomeController::class,'store'])->middleware('auth')->name('add_user');
Route::get('/user/{id}/delete', [AdminHomeController::class,'destroy'])->middleware('auth')->name('delete_user');
Route::get('/search_users', [AdminHomeController::class,'search'])->middleware('auth')->name('search_users');



Route::get('/admin_profile', [AdminProfileController::class,'index'])->middleware('auth')->name('admin_profile');
Route::post('/admin_profile/{id}/update', [AdminProfileController::class,'update'])->middleware('auth')->name('update_admin_profile');


Route::get('/admin_events', [AdminEventsController::class,'index'])->middleware('auth')->name('admin_events');
Route::post('/add_event', [AdminEventsController::class,'store'])->middleware('auth')->name('add_event');
Route::get('/event/{id}/delete', [AdminEventsController::class,'destroy'])->middleware('auth')->name('delete_event');
Route::get('/search_events', [AdminEventsController::class,'search'])->middleware('auth')->name('search_events');



Route::get('/admin_interests', [AdminInterestController::class,'index'])->middleware('auth')->name('admin_interests');
Route::post('/add_interests', [AdminInterestController::class,'store'])->middleware('auth')->name('add_interests');
Route::get('/interest/{id}/delete', [AdminInterestController::class,'destroy'])->middleware('auth')->name('delete_interest');
Route::get('/search_interests', [AdminInterestController::class,'search'])->middleware('auth')->name('search_interests');



Route::get('/admin_user_interests', [AdminUserInterestsController::class,'index'])->middleware('auth')->name('admin_user_interests');

Route::get('/search_user_interests', [AdminUserInterestsController::class,'search'])->middleware('auth')->name('search_user_interests');




Route::get('/logout', function(){
    auth()->logout();

    return redirect()->route('login');
})->middleware('auth')->name('logout');






                                  
