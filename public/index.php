<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
|	实际上是对整个web下的目录进行扫描,以对象数组的形式构建了classMap文件目录映射
|
|
*/
require __DIR__.'/../bootstrap/autoload.php';
/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
|	实例化一个app
|
*/
$app=require_once __DIR__.'/../bootstrap/app.php';
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can simply call the run method,
| which will execute the request and send the response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
|   运行app,对捕获的http请求进行处理,返回结果给浏览器,程序结束
|
*/
//print_r(Illuminate\Http\Request::capture());
//exit();
$kernel=$app->make('Illuminate\Contracts\Http\Kernel');
$response=$kernel->handle($request=Illuminate\Http\Request::capture());
$response->send();
$kernel->terminate($request,$response);
