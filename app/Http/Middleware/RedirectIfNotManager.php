<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotManager {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//第一个条件用于判断是否登录,第二个条件用于判断是否为管理员
		//第二个条件依赖第一个条件,不然$request->user()为Null
		if(\Auth::user() && !$request->user()->IsManager()){
			return redirect('articles');
		}
		return $next($request);
	}

}
