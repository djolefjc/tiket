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


//main page
Route::get('/','PagesController@index');

//Tickets
Route::resource('tickets','TicketController');

Route::get('tickets/{ticket}/user','TicketController@showUser');

Route::get('/tickets/{ticket}/delete','TicketController@delete');

Route::post('/tickets/{ticket}/edit','TicketController@change');




//Users
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admins
