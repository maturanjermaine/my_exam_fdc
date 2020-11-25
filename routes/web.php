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
    return redirect('login');
});

Auth::routes();

Route::group( ['middleware' => ['auth']], function() { 
    Route::get('thank-you', 'HomeController@thankYou')->name('thank-you');
    Route::get('contacts', 'ContactController@index')->name('contacts');
    Route::get('add-contact', 'ContactController@addContact')->name('add-contact');
    Route::post('store-contact', 'ContactController@storeContact')->name('store-contact');
    Route::match(['get', 'post'], 'edit-contact/{id}', 'ContactController@editContact')->name('edit-contact');
    Route::get('remove-contact/{id}', 'ContactController@removeContact')->name('remove-contact');
    Route::post('search-contact', 'ContactController@searchContact')->name('search-contact');
});



// Route::get('/home', 'HomeController@index')->name('home');
