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

Route::get('/','DashboardController@landing');

Route::resource('/answer','AnswerController');

Route::resource('/sub','SubscriptionController');

Route::resource('/category','CategoryController');

Route::get('/home','HomeController@home');

Route::get('/single/{id}','AnswerController@single')->name('answer.single');

Route::get('/pay/{price}/{id}','PaymentController@singlepay')->name('pay.singlepay');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
