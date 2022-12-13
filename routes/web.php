<?php
use Illuminate\Support\Facades\Route;
    Route::group(['namespace' => 'Auth'], function(){
        Route::get  ('login','LoginController@getLogin')    ->name('get.login');
        Route::post ('login','LoginController@postLogin')   ->name('post.login');

        Route::get ('logout','LoginController@getLogout')   ->name('get.logout');

        Route::get  ('register'  ,'RegisterController@getRegister')  ->name('get.register');
        Route::post ('register'  ,'RegisterController@postRegister') ->name('post.register');

        Route::get  ('forgot'  ,'ForgotPasswordController@getFormResetPassword')  ->name('get.form.reset.password');
        Route::post  ('forgot' ,'ForgotPasswordController@sendCodeResetPassword');

        Route::get  ('reset'  ,'ForgotPasswordController@getresetPassword')  ->name('get.send.reset.password');
    });

    Route::group(['middleware' => 'locale'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('language.change');
    });
    
    Route::get('/tag/{slug}', 'TagController@index');

    Route::get('/videos', 'VideoController@index');

    Route::get('/images', 'ImageController@index');

    Route::get('/audios', 'AudioController@index');

    Route::get('/hot', 'HotController@index');

    Route::get('/category/{slug}', 'CategoryController@index');

    Route::get('/tag/{tag}', 'TagController@index');

    Route::get('/search/{search}', 'SearchController@index');

    Route::get('/{id}/{slug}', 'DetailController@index');

    Route::get('/news', 'NewsController@index');

    Route::get('/login', 'AuthController@login')->name('get.login');

    Route::get('/register', 'AuthController@register')->name('get.register');

    Route::get('/forgot', 'AuthController@forgot')->name('get.forgot');
    

    //Hiển thị tổng quan user
    Route::group(['prefix' => 'user','middleware' =>'checklogin'],function(){
        Route::get('/info','UserController@updateInfo')->name('user.update.info');
        Route::post('/info','UserController@saveUpdateInfo');
        //Thay đổi mật khẩu
        Route::get('/password','UserController@updatePassword')->name('user.update.password');
        Route::post('/password','UserController@saveUpdatePassword');
    });