<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
class User extends Model implements AuthenticatableContract,CanResetPasswordContract{
	use Authenticatable,CanResetPassword;
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table='users';
	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable=[
		'name',
		'email',
		'password'
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden=[
		'password',
		'remember_token'
	];
	/**
	 * 对象关系模型,一个用户可以有多篇文章
	 * 例如我们可以通过以下代码获取关联模型中的文章信息
	 * $user=App\User::first();
	 * $user->articles->toArray();
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles(){
		return $this->hasMany('App\Article');
	}

	public function IsManager(){
		return true;
	}
}
