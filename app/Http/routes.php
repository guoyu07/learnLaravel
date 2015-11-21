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
//即/home
Route::get('home','HomeController@index');

//Route::get('contact','TestController@contact');
//use function as second argument to return execute results;
Route::get('contact',function(){
	return 'If you are interested in me,please contact me on QQ with number 924714558';
});

//在进入/about之前通过自定义中间件进行权限控制,注意后面是"uses",而不是"use"
Route::get('about',['middleware'=>'manager','uses'=>'TestController@about']);


/*
注意匹配顺序,一般来说,范围小的要有更高的优先级
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
//对于表单提交等状况,请使用Route::post()方法,因为Route:get路由只能接收get请求
//不然后果很严重,直接报错处理
Route::post('articles/store','ArticlesController@store');
Route::get('articles/{id}/edit',"ArticlesController@edit");
Route::get('articles/{id}',[
		'as'=>'zqq',
    'uses'=>'ArticlesController@show'
]);
*/
//下面这一行代码,就可以概括上述注释掉的路由配置,不过表单的action写法也需要相对应的进行更改
//具体看git记录
Route::resource('articles','ArticlesController');
Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController',
]);
