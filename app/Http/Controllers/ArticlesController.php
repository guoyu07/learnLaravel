<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
//use Illuminate\Http\Request;
//上述的Request是默认生成的,至于为嘛不用,而是用下面这个,我还没想清楚
class ArticlesController extends Controller{
	/*显示所有数据*/
	public function index(){
		$articleModel=new Article();
		//  return view('articles/index')->with('list',$articleModel->all()->toArray());
		//  latest方法可以传字段参数,默认按照createed_at时间倒序排,额外的功能请直接看源码
		//  return view('articles/index')->with('list',$articleModel::latest()->get());
		//  加上where限制条件
		//  return view('articles/index')->with('list',$articleModel::latest()
		//			->where('published_at','<=',Carbon::now())->get());
		//  使用模型中自定义的expandScope方法拼凑sql代码片段

		return view('articles/index')->with('list',Article::latest()->published()->get());
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
	public function store(Requests\CreateArticleRequest $request){
		Article::create($request->all());
		return redirect('/articles');
	}
}
