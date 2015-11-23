<?php namespace App;

use Illuminate\Database\Eloquent\Model;
/**文章标签
 * Class Tag
 * @package App
 */
class Tag extends Model {

	public function articles(){
		return $this->belongsToMany('App\Article');
	}

}
