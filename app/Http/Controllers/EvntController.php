<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Contracts\Auth\Authenticator;
use App\Evnt;
use App\User;
use App\Venue;
use App\Category;
use \Input;


class EvntController extends Controller {

	public function __construct( Authenticator $auth){
		$this->beforefilter('auth',['except'=>['index','show','category']]);
		$this->user = $auth;
		
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()

	{
		$search = \Request::get('q');
		$categories = Category::orderBy('categoryName','asc')->get();
		$data = $search ? 
				Evnt::Search($search)->AllEvents()->paginate('20') 
				: $data = Evnt::AllEvents()->orderBy('when')->paginate('20');

		//dd($data->toarray());
		return view('events.index',compact('data','categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user_id = $this->user->id();
		$venues = User::find($user_id)->venues()->lists('venueName','id');
		$categories = Category::orderBy('categoryName')->lists('categoryName','id');
		//dd($venues);
		return view('events.create',compact('venues','categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateEventRequest $request)
	{
		//dd($this->user->id());
		//$dt = \Carbon::create($request->when);
		//dd($request->when);



		$event = new Evnt;
		$event->name = 	$request->name;
		$event->user_id = $this->user->id();
		$event->when = $request->when;
		$event->end  = $request->end;
		$event->cover = $request->cover;
		$event->info = $request->info;
		$event->detail = $request->detail;
		$event->slug = \Str::slug($request->name);
		$event->category_id = $request->category_id;

		if(\Input::hasfile('flyer')){
			$imgwidth = getimagesize(\Input::file('flyer'));
            $extension = \Input::file('flyer')->getClientOriginalExtension();
            $filename = Str_random(8) .'.' . $extension;

            $event->flyer = $filename;
            $destinationpath = 'uploads/'.$this->user->id();
            \Input::file('flyer')->move($destinationpath,$filename);

            \Cloudy::upload($destinationpath .'/' .$filename,$filename);  //send photo to cloudy
            \File::deletedirectory($destinationpath); // temp folder
		}


		$user_id = $this->user->id();
		$user = Venue::find($request->venue_id)->evnts()->save($event);
		return \Redirect::route('show.event',[$user->slug])->with('message','Event posted..yayyyyy.');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$data = Evnt::whereSlug($slug)->firstorfail();

		return View('events.show',compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $sluu\g
	 * @return Response
	 */
	public function edit($slug)
	{
		//
		$user_id = $this->user->id();
		$event = Evnt::whereSlug($slug)->firstorfail();
		$venues = User::find($user_id)->venues()->lists('venueName','id');
		$categories = Category::lists('categoryName','id');
		return View('events.edit',compact('event','venues','categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateEventRequest $request, $slug)
	{
		//
		$event = Evnt::whereSlug($slug)->firstorfail();
		$event->name = 	$request->name;
		$event->when = $request->when;
		$event->end  = $request->end;
		$event->cover = $request->cover;
		$event->info = $request->info;
		$event->detail = $request->detail;
		$event->slug = \Str::slug($request->name);
		$event->category_id = $request->category_id;

		if(\Input::hasfile('flyer')){
			$imgwidth = getimagesize(\Input::file('flyer'));
            $extension = \Input::file('flyer')->getClientOriginalExtension();
            $filename = Str_random(8) .'.' . $extension;

            $event->flyer = $filename;
            $destinationpath = 'uploads/'.$this->user->id();
            \Input::file('flyer')->move($destinationpath,$filename);

            \Cloudy::upload($destinationpath .'/' .$filename,$filename);  //send photo to cloudy
            \File::deletedirectory($destinationpath); // temp folder
		}


		$user = Venue::find($request->venue_id)->evnts()->save($event);
		
		return \Redirect::route('show.event',[$user->slug])->with('message','Event Updated..yayyyyy.');


	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($slug)
	{
		// softdelete
		$event = Evnt::whereSlug($slug)->firstorfail();
		$event->delete();
		return \Redirect::route('dashboard')->with('message','Event deleted');
	}

		public function restore($slug)
	{
		//

		$event = Evnt::withTrashed()->whereSLug($id)->firstOrFail();
		$event->restore();
		return \Redirect::route('dashboard')->with('message','Event restored');
	}

	public function expire()
	{
		$expire =  Evnt::where('when','<', \Carbon::now())->update(['expire'=> true]);
		return $expire;
	}

	public function category($slug)
	{
		//toda find Paginate
		$data = Category::with('evnts')->GetCategoryBySlug($slug)->firstOrFail();
		//dd($data->toArray());
		//$evnts = $data->Evnts()->paginate('20');
		$search = \Request::get('q');
		$evnts = $search ? 
				Evnt::Search($search)->AllEvents()->paginate('20') 
				: $evnts = $data->Evnts()->orderBy('when','ASC')->paginate('20');
		//dd($evnts->toarray());
		$categories = Category::all();
		return View('categories.index',compact('data','categories','evnts'));
	}

}
