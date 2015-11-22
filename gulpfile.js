var elixir=require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function(mix){

    console.log(mix);//mix参数是elixir对象

    /*
     less默认编译的目录为
     resources/assets/css/=>public/css/
     resources/assets/js/=>public/js/
     */

    //处理单个less
    mix.less('app.less');


    //处理多个less
    mix.styles(['../less/test/hello.less','../less/test/world.less'],'public/css/test/all.css');


    //处理单个js
    //mix.scripts('Hello.js');
    //合并多个JS
    mix.scripts([
        'test/Hello.js',
        'test/World.js'
    ],'public/js/test/all.js');

    /*防止浏览器缓存,在blade页面调用时,需要使用{{ elixir('path/to/file') }}获取文件名前的hash值*/
    mix.version('public/css/test/all.css');

    /*
     执行gult --production可以对代码进行压缩
     */

});
