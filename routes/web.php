<?php

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
    return view('applicants.form');
});
Route::get('/single', function () {
    return view('applicants.single-applicant');
});
Route::post('/create','ApplicanController@create');
Route::get('/allApplicans', 'ApplicanController@show');
Route::get('/single/{id}', 'ApplicanController@single');

Route::get('/admin', 'AdminsController@show');
Route::get('admin/update/{id}', 'AdminsController@single');
Route::get('admin/delete/{id}','AdminsController@destroy');
Route::post('admin/finishUpdate/{id}','AdminsController@update');

Auth::routes();

Route::get('/admin/login', 'AdminsController@index')->name('home');
//Route::get('/admin/logout', 'AdminsController@')
