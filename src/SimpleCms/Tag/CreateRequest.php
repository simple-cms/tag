<?php namespace SimpleCms\Tag;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
      'slug' => 'alpha_dash|max:80',
      'meta_title' => 'max:70',
      'meta_description' => 'max:155',
      'title' => 'max:100|required',
      'excerpt' => 'required',
      'content' => 'required'
    ];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
