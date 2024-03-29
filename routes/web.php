<?php
use Illuminate\Support\Facades\Route;
    Route::group(['middleware' => 'locale'], function () {
        Route::group(['namespace' => 'Auth'], function(){
            Route::get  ('login','LoginController@getLogin')->name('get.login');
            Route::post ('login','LoginController@postLogin')->name('post.login');
    
            Route::get ('logout','LoginController@getLogout')->name('get.logout');
    
            Route::get  ('register'  ,'RegisterController@getRegister')->name('get.register');
            Route::post ('register'  ,'RegisterController@postRegister')->name('post.register');
    
            Route::get  ('forgot'  ,'ForgotPasswordController@getFormResetPassword')->name('get.forgot');
            Route::post  ('forgot' ,'ForgotPasswordController@sendCodeResetPassword')->name('post.forgot');
    
            Route::get  ('reset'  ,'ResetPasswordController@getResetPassword')->name('get.reset');

            Route::post  ('reset'  ,'ResetPasswordController@resetPassword')->name('post.reset');
            
        });

        Route::get('/', 'HomeController@index')->name('home');
        // Route::get('/load-more', 'HomeController@loadmore')->name('loadmore');
    
        Route::post('/bookmark/{id}/toggle', 'HomeController@bookmark')->name('check.bookmark');
        Route::get('/bookmark', 'HomeController@bookmarkList')->name('get.bookmark');

        Route::post('/favorite/{id}/toggle', 'HomeController@favorite')->name('check.favorite');
        Route::get('/favorite', 'HomeController@favoriteList')->name('get.favorite');



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
        Route::post('/{id}/{slug}/addcomment', 'DetailController@addcomment')->name('post.comment');
        Route::post('/{id}/{slug}/removecomment', 'DetailController@removecomment')->name('delete.comment');

        Route::post('/{id}/{slug}/addreply', 'DetailController@addreply')->name('post.reply');
        Route::post('/{id}/{slug}/removereply', 'DetailController@removereply')->name('delete.reply');

        Route::post('/vote/{id}/toggle', 'DetailController@like')->name('toggle.like');

        Route::get('/news', 'NewsController@index');

        Route::get('/feedback', 'FeedbackController@index')->name('get.feedback');
        Route::post('/feedback', 'FeedbackController@postFeedback')->name('post.feedback');;
    
        //Hiển thị tổng quan user
        Route::group(['middleware' =>'checklogin'],function(){
            Route::get('/my-setting', 'UserController@mySeting')->name('user.get.myseting');
            Route::post('/my-setting/{id}/save-edit', 'UserController@saveMySeting')->name('users.save-edit');
            
            Route::post('/my-setting/{id}/change-password', 'UserController@changePassword')->name('users.change-password');

            Route::get('/my-favorites', 'UserController@myFavorite')->name('user.get.myfavorite');

            Route::get('/my-profile', 'UserController@myProfile')->name('user.get.myprofile');

            Route::get('/message', 'UserController@message')->name('user.get.message');

            Route::get('/follower', 'UserController@follower')->name('user.get.follower');

            Route::get('/following', 'UserController@following')->name('user.get.following');
        });
    });
    
