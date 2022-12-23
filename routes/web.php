<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth', 'as'=>'admin.' , 'middleware'=>'is_admin'], function (){
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::post('/createPoll',[App\Http\Controllers\Admin\PollController::class,'store'])->name('create_poll');
    Route::post('/createOption',[App\Http\Controllers\Admin\OptionController::class,'store'])->name('add_option');
    Route::get('/add-poll',[App\Http\Controllers\Admin\PollController::class,'create'])->name('add_poll');
    Route::get('/user-index',[App\Http\Controllers\Admin\PollController::class, 'show'])->name('show_index');
    Route::get('/view-stats/{poll}',[App\Http\Controllers\Admin\PollController::class, 'viewStats'])->name('show_stats');
   

});
Route::group(['prefix'=>'user','middleware'=>'auth','as'=>'user.'],function(){
    Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::get('/admin-index',[App\Http\Controllers\User\PollController::class, 'show'])->name('show_index');
    Route::get('/show/{Poll}',[App\Http\Controllers\User\OptionController::class, 'show'])->name('show_poll');
    Route::post('/vote',[App\Http\Controllers\User\VoteController::class, 'create'])->name('vote');
});




