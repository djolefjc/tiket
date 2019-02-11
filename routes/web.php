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

Route::post('/tickets/{ticket}/status','TicketController@status')->name('ticket.status');

Route::get('/tickets/{ticket}/user','TicketController@showUser')->name('ticket.user');

Route::get('/tickets/{ticket}/delete','TicketController@delete')->name('ticket.delete');

Route::post('/tickets/{ticket}/edit','TicketController@change')->name('ticket.change');



//Users
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Answers
Route::get('/answers/{ticket}/create','AnswersController@create')->name('answers.create');
Route::post('/answers/{ticket}/store','AnswersController@store')->name('answers.store');

//Admins
