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

    /*console.log(mix);//mix参数是elixir对象
     style方法与js方法默认编译的目录分别为
     resources/assets/css/=>public/css/
     resources/assets/js/=>public/js/
     执行gulp --production可以对代码进行压缩
     */

    /*
     (1) 处理less文件的原则是先通过less方法将单个的less文件编译成css
        然后再通过style方法将多个css文件进行合并,不然会报错
     (2) verson方法可以防止浏览器缓存,在blade页面调用时,需要使用{{ elixir('path/to/file') }}获取文件名前的hash值
     */

    mix.less('app.less');

    //mix.version('public/css/all.css');


    /*
     (1)处理单个js
     (2)合并多个JS
     */
    //mix.scripts('Hello.js');
    mix.scripts([
        'test/Hello.js',
        'test/World.js'
    ],'public/js/test/all.js');

});
