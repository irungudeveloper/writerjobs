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

Route::get('/','LandingController@index')->name('landing.index');

Route::resource('/landing','LandingController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('/roles','RolesController');

Route::resource('/jobs','WriterJobsController');
Route::post('/jobs/update/{id}','WriterJobsController@update')->name('jobs.update');

Route::resource('/admin','AdminController');

Route::resource('/status','StatusController');

Route::resource('/subpackage','SubpackageController');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
