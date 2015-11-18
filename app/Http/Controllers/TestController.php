<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
class TestController extends Controller{
	public function contact(){
		//        return "contact me at weibo";//输出文字
		//        return view('contact');//输出视图
		//        return view('page/contact');//以传统格式输出文件夹下的视图
		return view('test.contact');
	}
	public function about(){
		/*传多个变量*/
		$name="siguoya";
		$name="<span style='color: #2ca02c'>siguoya</span>";
		/*return view('test.about')->with('name',$name);*/
		/*传数组*/
		$name=[
			'firstName'=>'Qingquan',
			'lastName'=>'Zeng'
		];
		return view('test.about',$name);
		//作为view的第二个参数,而不是使用with连接,相当于JS中的匿名函数
	}
}
