<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTagsTable extends Migration{
	/**
	 * 我们在up方法里面创建了两个表,相应地,在down方法里面也应该删除两个表
	 * 不然migrate:refresh会报错
	 * Run the migrations.
	 * @return void
	 */
	public function up(){
		/**
		 * 外键是在从表里面定义的,与主表主键相关联的字段
		 * 外键必须被索引
		 * timestamps会自动创建create_at与update_at两个字段
		 * timestamp必须要传递一个参数,根据参数名创建时间戳类型的字段
		 * 枢纽表的命名创建,请不要加"s",不然在查询的时候会报错无法找到表
		 */
		Schema::create('tags',function (Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::create('article_tag',function (Blueprint $table){
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index();
			$table->integer('tag_id')->unsigned()->index();

			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down(){
		Schema::drop('tags');
		Schema::drop('article_tags');
	}
}
