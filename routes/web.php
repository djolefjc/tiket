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
Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('register', 'AdminController@create')->name('admin.register');
  Route::post('register', 'AdminController@store')->name('admin.register.store');
  Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
  Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});
