<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;
//上述的Request是默认生成的,至于为嘛不用,而是用下面这个,我还没想清楚
class ArticlesController extends Controller{

	public function __construct(){
		//中间件,在控制器中加入权限控制
		//对Article控制器中所有方法都加入权限控制
		//$this->middleware('auth');
		//通过中间件,对Article控制器中的create方法进行控制
		$this->middleware('auth',['only'=>'create']);

	}

	/*显示所有数据*/
	public function index(){
		//		return \Auth::user()->name;//用于获取session中的用户权限数据
		$articleModel=new Article();
		//  return view('articles/index')->with('list',$articleModel->all()->toArray());
		//  latest方法可以传字段参数,默认按照createed_at时间倒序排,额外的功能请直接看源码
		//  return view('articles/index')->with('list',$articleModel::latest()->get());
		//  加上where限制条件
		//  return view('articles/index')->with('list',$articleModel::latest()
		//			->where('published_at','<=',Carbon::now())->get());
		//  使用模型中自定义的expandScope方法拼凑sql代码片段
		return view('articles/index')->with('list',Article::latest()
		                                                  ->published()
		                                                  ->get());
	}
	/*显示一个数据*/
	public function show($id){
		if($id=='null'){
			abort(404);//练习404的用法
		}
		$articleModel=new Article();
		//  return $articleModel->find($id);
		//  findOrFail如果查询不到记录会抛出异常
		return view('articles/show')->with('single',$articleModel->findOrFail($id));
		//  return view('articles/show')->with('single',$articleModel->find($id));
	}
	/*发布文章页面*/
	public function create(){
		if(Auth::guest()){
			return redirect('/articles');
		}
		return view('articles.create');
	}


	/*不对表单数据进行验证发表文章,需要use Request;
	public function store(){
		$input=Request::all();//获取所有请求
		//$input=Request::get('title');//获取get请求
		Article::create($input);
		return redirect('/articles');
	}*/
	//对表单数据进行验证发表文章,不需要use Request;
	public function store(Requests\ArticleRequest $request){
		Article::create($request->all());
		return redirect('/articles');
	}
	public function edit($id){
		$article=Article::findOrFail($id);
		//		return compact('article');
		return view('articles.edit',compact('article'));
	}
	public function update(Requests\ArticleRequest $request,$id){
		$article=Article::findOrFail($id);
		$article->update($request->all());
		return redirect('/articles');
	}
}
