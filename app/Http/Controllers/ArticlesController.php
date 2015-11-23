<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Tag;
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
		//  return \Auth::user()->name;//用于获取session中的用户权限数据
		//  $articleModel=new Article();
		//  return view('articles/index')->with('list',$articleModel->all()->toArray());
		//  latest方法可以传字段参数,默认按照createed_at时间倒序排,额外的功能请直接看源码
		//  return view('articles/index')->with('list',$articleModel::latest()->get());
		//  加上where限制条件
		//  return view('articles/index')->with('list',$articleModel::latest()
		//			->where('published_at','<=',Carbon::now())->get());
		//  使用模型中自定义的expandScope方法拼凑sql代码片段
		return view('articles/index')->with('list',Article::latest()->published()->get());
	}


	/**显示一条数据
	 * 在App\Providers\RouteServiceProvider中进行了模型绑定之后
	 * public function show($id){}中$id接收到的将不是参数,而是绑定的模型结果集
	 * @param Article $article
	 * @return \Illuminate\View\View
	 */
	public function show(Article $article){
		//  return $articleModel->find($id);
		//  findOrFail如果查询不到记录会抛出异常
		//  $article=Article::findOrFail($id);
		//  zqq($article);
		//  return view('articles/show')->with('single',Article::findOrFail($id));
		return view('articles/show',compact('article'));
	}


	/**
	 * 发布文章页面
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function create(){
		/*
		if(Auth::guest()){
			return redirect('/articles');
		}
		*/
		//Tag::lists('name','name')返回一个数组
		//相当于select name,name from siguoya_tags,
		//其中第一个参数为返回的数组中的值
		//其中第二个参数为返回的数组中的键
		$tags=Tag::lists('name','id');
		//zqq($tags);
		return view('articles.create',compact('tags'));
	}


	/*不对表单数据进行验证发表文章,需要use Request;
	public function store(){
		$input=Request::all();//获取所有请求
		//$input=Request::get('title');//获取get请求
		Article::create($input);
		return redirect('/articles');
	}*/


	/**对表单数据进行验证发表文章,不需要use Request;
	 * @param \App\Http\Requests\ArticleRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Requests\ArticleRequest $request){
		//存储文章数据
		$article=Auth::user()->articles()->create($request->all());
		//存储关联模型数据,两种方法
		//$article->tags()->attach($request->input('tag_list'));
		$this->syncTags($article,$request->input('tag_list'));

		//一个是通过类的方法设置值,一个是通过函数设置值
		//\Session::flash('createResult','Success in creating previous article');
		session()->flash('createResult','Success in creating previous article');
		return redirect('/articles');
	}


	/**
	 * 文章编辑
	 * 使用了路由绑定模型
	 * @param Article $article
	 * @return \Illuminate\View\View
	 */
	public function edit(Article $article){
		$tags=Tag::lists('name','id');
		return view('articles.edit',compact('article','tags'));
	}


	/**文章更新,使用路由绑定
	 * @param \App\Http\Requests\ArticleRequest $request
	 * @param \App\Article $article
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Article $article,Requests\ArticleRequest $request){
		/*
		$article=Article::findOrFail($id);
		$article->update($request->all());
		*/
		//$article->update($request->all());
		//修改了文章标签之后,使用sync同步语句来增加或删除标签关联模型中的数据记录
		//使用window+alt+m可以剥离出通用的方法,对代码进行重构
		$this->syncTags($article,$request->input('tag_list'));
		return redirect('/articles');
	}
	/**
	 * 实现关联模型在修改时的同步功能
	 * @param \App\Article $article
	 * @param array $tags
	 */
	public function syncTags(Article $article,array $tags){
		$article->tags()->sync($tags);
	}


	/*
	增->create
	删->destroy
	查->find
	改->save
	*/
}
