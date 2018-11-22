<?php

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {
    Route::get('/', 'AuthController@login')->name('admin');
    Route::post('/', 'AuthController@postLogin')->name('admin.login');
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
    });

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/users', 'AdminController@createUsers')->name('admin.create.users');
    Route::post('/users', 'AdminController@storeUsers')->name('admin.users.create');
    Route::get('users/loans', 'AdminController@createLoans')->name('admin.users.loans');
    Route::post('/users/loans', 'AdminController@storeLoans')->name('admin.store.loans');
    Route::get('/users/loans/{id}', 'AdminController@checkUser');
});