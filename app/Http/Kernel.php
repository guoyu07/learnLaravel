<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
class Kernel extends HttpKernel{
	/**
	 * The application's global HTTP middleware stack.
	 * 所有的HTTP请求都会自动经过以下中间件的处理
	 * @var array
	 */
	protected $middleware=[
		//检查是否为维护模式,可以通过artisan down进入维护模式,防止用户访问
		//也可以使用artisan up恢复正常.维护模式下,storage/framework下面会自动生成一个临时的down文件
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
		//自己写一个中间件出来,判断URL参数里面是否有love,如果有就跳到文章首页
		'App\Http\Middleware\Demo'
	];


	/**
	 * The application's route middleware.
	 * 用于在routes.php中指定后使用
	 * @var array
	 */
	protected $routeMiddleware=[
		'auth'=>'App\Http\Middleware\Authenticate',
		'auth.basic'=>'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest'=>'App\Http\Middleware\RedirectIfAuthenticated',
		//自定义Route中间件
		'manager'=>'App\Http\Middleware\RedirectIfNotManager',
	];

	/*$middleware中间件会被自动调用,$routeMiddleware需在路由中指明*/

}
