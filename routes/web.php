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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/roles','RolesController');

Route::resource('/jobs','WriterJobsController');
Route::post('/jobs/update/{id}','WriterJobsController@update')->name('jobs.update');

Route::resource('/admin','AdminController');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
