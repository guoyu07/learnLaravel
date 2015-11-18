<?php namespace App\Exceptions;
/*异常捕获处理类,可以自定义如何处理*/
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
class Handler extends ExceptionHandler{
	/**
	 * A list of the exception types that should not be reported.
	 * @var array
	 */
	protected $dontReport=[
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];
	/**
	 * Report or log an exception.
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 * @param  \Exception $e
	 * @return void
	 */
	public function report(Exception $e){
		return parent::report($e);
	}
	/**
	 * Render an exception into an HTTP response.
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request,Exception $e){
		/*Original Code
		if($this->isHttpException($e)){
			return $this->renderHttpException($e);
		}else{
			return parent::render($request,$e);
		}*/

		if($this->isHttpException($e)){
			return $this->renderHttpException($e);
		}elseif($e instanceof ModelNotFoundException){
			//自定义逻辑语句
		}
		return parent::render($request,$e);
	}
}
