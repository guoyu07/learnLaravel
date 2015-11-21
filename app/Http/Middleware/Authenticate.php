<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class Authenticate{
	/**
	 * The Guard implementation.
	 * @var Guard
	 */
	protected $auth;
	/**
	 * Create a new filter instance.
	 * @param  Guard $auth
	 * @return void
	 */
	public function __construct(Guard $auth){
		$this->auth=$auth;
	}
	/**
	 * Handle an incoming request.
	 * 如果是访客,判断是否为跨站登录
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request,Closure $next){
		if($this->auth->guest()){
			if($request->ajax()){
				return response('Unauthorized.',401);
			}else{
				return redirect()->guest('auth/login');
			}
		}
		return $next($request);
	}
}
