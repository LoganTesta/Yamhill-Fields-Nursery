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

Route::get('/', function(){
	return view('index');
});

Route::get('/index', function(){
	return view('index');
});


/*Subpages*/
Route::get('/about-us', function(){
	return view('about-us');
});

Route::get('/our-blog', function(){
	return view('our-blog');
});

Route::get('/plants', function(){
	return view('plants');
});

Route::get('/supplies', function(){
	return view('supplies');
});

Route::get('/contact-us', 'ContactUsValidationController@displayContactForm');

Route::get('/404', function(){
	return view('404');
});

Route::get('/500', function(){
	return view('500');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


/*POST routes*/
Route::post('/contact-us', function(){
	return view('contact-us');
});

/*Contact us form validation */
Route::get('/contact-us-form-validation', 'ContactUsValidationController@displayContactForm');
Route::post('/contact-us-form-validation', 'ContactUsValidationController@validateform');

/*404 error handling*/
Route::get('404',['as'=>'404','uses'=>'ErrorHandlingController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlingController@errorCode405']);
Route::get('500',['as'=>'500','uses'=>'ErrorHandlingController@errorCode500']);
