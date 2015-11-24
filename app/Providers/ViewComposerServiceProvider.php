<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;
/**
 * By zqq
 * php artisan make:provider ViewComposerServiceProvider
 * Class ViewComposerServiceProvider
 * @package App\Providers
 */
class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//往视图里面注入全局共享的数据,例如导航条里面的内容
		view()->composer('common.nav',function($view){
			$view->with('latest',Article::latest()->first());
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
