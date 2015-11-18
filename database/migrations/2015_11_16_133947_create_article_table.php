<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			//在本表中设置一个user_id字段,作为外键,注意外键的字段属性是unsigned,必须不分正负
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->text('content');
			$table->timestamp('published_at');
			$table->timestamps();
			/*指定删除时的动作为级联删除,实质上就是对mysql数据表的属性进行设置*/
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
