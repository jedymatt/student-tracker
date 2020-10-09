<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::post('/updateStudent', 'HomeController@update');
Route::get('/staffHome', 'ReportController@index')->name('staffHome');
// Route::post('/viewStudent', 'ViewStudentController@index')->name('viewStudent');
Route::post('/removeStudent', 'ReportController@update');
Route::post('/viewStudent', 'ReportController@viewStudent')->name('viewStudent');
