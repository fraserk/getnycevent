<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\contactFormRequest;

class StaticController extends Controller {

	//


public function contact() 
	{
		return View('static.contact');
	}
public function sendcontact(contactFormRequest $request)
{
	
	$data = array( 

				'name'=>$request->name,
				'detail'=>$request->detail,
				'email' => $request->email,
				'subject' => $request->subject
				);

	\Mail::send('static.message',$data,function($message)
			{
				//$message->from(Input::get('email'));
				$message->to('info@getnycevent.com','getnycevent')->subject('getnycevent - Message');



			});
		return  \Redirect::route('contact')->with('message','Thank You...');

}
}
