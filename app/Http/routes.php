<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','WelcomeController@index');
Route::get('home','HomeController@index');  //  即/home
Route::get('contact','TestController@contact');//    即/contact
Route::get('about','TestController@about');//

/*注意匹配顺序,一般来说,范围小的要有更高的优先级*/
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
//对于表单提交等状况,请使用Route::post()方法,因为Route:get路由只能接收get请求
//不然后果很严重,直接报错处理
Route::post('articles/store','ArticlesController@store');
Route::get('articles/{id}',[
	'as'=>'zqq',
    'uses'=>'ArticlesController@show'
]);


Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController',
]);
