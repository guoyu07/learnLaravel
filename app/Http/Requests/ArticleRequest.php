<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		//如果返回值为false,则会报出403 forbidden错误
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		//'ruleA|ruleB'的另一种写法是['ruleA','ruleB']
		return [
			'title'=>'required|min:3|max:20',
			'content'=>'required',
			'published_at'=>'required|date'
		];

		/*如果你想分场景来进行验证
		$rules=[];
		if($condition=='aaa'){
			$rules['bbb']='cccc';
		}
		return $rules;*/
	}

}
