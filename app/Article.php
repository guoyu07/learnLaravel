<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Article extends Model{
	/*
	 *用于设置哪些字段才可以插入到数据表中去
	 *避免在执行插入语句时,因为有_token而报错
	 */
	protected $fillable=[
		'title',
		'content',
		'published_at',
	  //用于测试管理模型
		'user_id'
	];


	/**
	 *无需手动调用,自动对字段进行过滤管理,参数名不可或缺,,尽管在调用的时候无需传参
	 */
	public function setPublishedAtAttribute($date){
		//忽略时/分/秒
		$this->attributes['published_at']=Carbon::parse($date);
		//保留时分秒
		$this->attributes['published_at']=Carbon::createFromFormat('Y-m-d',$date);
	}


	/*拼凑代码片段,供控制器使用,参数名不可或缺,,尽管在调用的时候无需传参
	 *在调用的时候,scopePublished要转换成published
	 */
	public function scopePublished($query){
		$query->where('published_at','<=',Carbon::now());
	}


	/**对象关系模型,一篇文章属于一个对象
	 * 例如我们可以通过以下代码获取关联模型中的信息
	 * $article=App\Article::first();
	 * $article->user->toArray();
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(){
		return $this->belongsTo('App\User');
	}
}
