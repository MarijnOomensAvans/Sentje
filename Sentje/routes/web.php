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

Route::get('/', 'HomeController@landing');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
        Route::get('locale/{locale}', function ($locale){
        Session::put('locale', $locale);
        return redirect('home');
    });

    Route::resource('bankaccounts', 'BankAccountController');
    Route::get('transactions/create/{bankaccount_id}', 'TransactionController@create')->name('transaction.create');
    Route::resource('transactions', 'TransactionController', ['except' => ['create']]);
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::post('settings', 'SettingsController@update')->name('settings');
    Route::get('pay/{transaction_id}', 'TransactionController@pay');
});


