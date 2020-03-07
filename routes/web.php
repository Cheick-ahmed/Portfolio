<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'HomeController');

/**
 * Projects
 */

Route::group(['prefix' => 'chs_admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    Route::get('', 'AdminController@index')->name('login');

    Route::get('login', 'AuthController@index')->name('login');

    Route::group(['prefix' => 'projects', 'as' => 'projects.'], function () {
        Route::get('', 'ProjectController@index')->name('index');
        Route::get('create', 'ProjectController@create')->name('create');
        Route::post('', 'ProjectController@store')->name('store');
        Route::get('{project:slug}/edit', 'ProjectController@edit')->name('edit');
        Route::patch('{project:slug}/edit', 'ProjectController@update')->name('update');
        Route::delete('{project:slug}', 'ProjectController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'skills', 'as' => 'skills.'], function () {
        Route::get('', 'SkillController@index')->name('index');
        Route::get('create', 'SkillController@create')->name('create');
        Route::post('', 'SkillController@store')->name('store');
        Route::get('{skill:slug}/edit', 'SkillController@edit')->name('edit');
        Route::patch('{skill:slug}/edit', 'SkillController@update')->name('update');
        Route::delete('{skill:slug}', 'SkillController@destroy')->name('destroy');
    });

    Route::post('upload', 'ImageController')->name('store.image');

});

Route::group(['prefix' => 'projects', 'as' => 'projects.'], function () {
    Route::get('', 'ProjectController@index')->name('index');
});

Route::group(['prefix' => 'skills', 'as' => 'skills.'], function () {
    Route::get('', 'SkillController@index')->name('index');
});
