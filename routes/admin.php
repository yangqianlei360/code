<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\LoginController@index')->name('login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::get('jump', 'Admin\JumpController@index')->name('admin.jump');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('home', 'Admin\HomeController@index');
        Route::get('welcome', 'Admin\WelcomeController@index')->name('admin.welcome');
        #管理员设置
        Route::get('info', 'Admin\InfoController@index')->name('admin.info');
        Route::post('info', 'Admin\InfoController@save')->name('admin.saveinfo');
        Route::post('changepass', 'Admin\InfoController@changepassword')->name('admin.changepassword');
        #系统设置
        Route::get('system','Admin\SystemController@index')->name('admin.system');
        Route::post('system','Admin\SystemController@save')->name('admin.system.save');
        #友情链接
        Route::get('link','Admin\LinkController@index')->name('admin.link');
        Route::get('create','Admin\LinkController@create')->name('admin.createlink');
        Route::post('link','Admin\LinkController@save')->name('admin.savelink');
        Route::get('link/{link}','Admin\LinkController@show')->name('admin.showlink');
        Route::put('link/{link}','Admin\LinkController@update')->name('admin.updatelink');
        Route::delete('link/{link}','Admin\LinkController@delete')->name('admin.deletelink');
        Route::delete('link','Admin\LinkController@delselect')->name('admin.delselectlink');
    });
});