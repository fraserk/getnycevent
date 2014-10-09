<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	protected $dontFlash = ['flyer'];
	public function rules()
	{
		
		return [
			//
			'name' => 'required',
			'flyer'=>'image|mimes:jpeg,bmp,png,gif|max:3000' ,
			'when'=> 'required|date',
			'end'=> 'required|date',
			'detail'=>'required'
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
