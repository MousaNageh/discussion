<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();//['verify' => true] to verfiy the user

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/discussion', 'DiscussionController');
Route::resource('/discussion/{discussion}/reply', 'RepliesController');
Route::get("users/notifcations","UserController@notifcations")->name("user.notifications") ;
Route::post("discussion/{discussion}/reply/{reply}/mark-as-best-reply","DiscussionController@reply")->name("discussion.reply.bestReplay");

