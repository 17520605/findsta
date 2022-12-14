<?php
use Illuminate\Support\Facades\Route;
    Route::group(['middleware' => 'locale'], function () {
        Route::group(['namespace' => 'Auth'], function(){
            Route::get  ('login','LoginController@getLogin')->name('get.login');
            Route::post ('login','LoginController@postLogin')->name('post.login');
    
            Route::get ('logout','LoginController@getLogout')->name('get.logout');
    
            Route::get  ('register'  ,'RegisterController@getRegister')->name('get.register');
            Route::post ('register'  ,'RegisterController@postRegister')->name('post.register');
    
            Route::get  ('forgot'  ,'ForgotPasswordController@getFormResetPassword')->name('get.form.reset.password');
            Route::post  ('forgot' ,'ForgotPasswordController@sendCodeResetPassword');
    
            Route::get  ('reset'  ,'ForgotPasswordController@getresetPassword')->name('get.send.reset.password');
        });

        Route::get('/', 'HomeController@index')->name('home');
    
        Route::post('/bookmark/{id}/toggle', 'HomeController@bookmark')->name('check.bookmark');
        Route::get('/bookmark', 'HomeController@bookmarkList')->name('get.bookmark');

        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('language.change');

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

        Route::get('/feedback', 'FeedbackController@index')->name('get.feedback');
        Route::post('/feedback', 'FeedbackController@postFeedback')->name('post.feedback');;
    
        //Hiển thị tổng quan user
        Route::group(['middleware' =>'checklogin'],function(){
            Route::get('/my-setting', 'UserController@mySeting')->name('user.get.myseting');
            Route::post('/my-setting/{id}/save-edit', 'UserController@saveMySeting')->name('users.save-edit');
            
            Route::get('/my-setting/password', 'UserController@saveMySetingPassword');

            Route::get('/my-favorites', 'UserController@myFavorite')->name('user.get.myfavorite');

            Route::get('/my-profile', 'UserController@myProfile')->name('user.get.myprofile');

            Route::get('/message', 'UserController@message')->name('user.get.message');

            Route::get('/follower', 'UserController@follower')->name('user.get.follower');

            Route::get('/following', 'UserController@following')->name('user.get.following');
        });
    });
    
