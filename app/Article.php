<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Article extends Model{
	/**用于设置哪些字段才可以插入到数据表中去
	 * 用于设置哪些字段才可以插入到数据表中去
	 * @type array
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
	/**
	 * 拼凑代码片段,供控制器使用,参数名不可或缺,,尽管在调用的时候无需传参
	 * 在调用的时候,scopePublished要转换成published
	 * @param $query
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
	/**对象关系模型,标签与文章,多对多
	 * 如果是通过文章获取标签,则使用以下方法;
	 * $article=new App\Article();
	 * $article->first()->tags->array();
	 * 通过标签获取文章同理
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
	/**
	 * 获取所有ID中,和当前文章有关的标签ID
	 * 在HTML页面诸如下拉菜单中显示时,有"选中"效果
	 * 该类命名有讲究,该方法会被自动调用
	 * @return array
	 */
	public function getTagListAttribute(){
		return $this->tags->lists('id');
	}
}
