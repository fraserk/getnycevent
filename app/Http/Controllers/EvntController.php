<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Contracts\Auth\Authenticator;
use App\Evnt;
use App\User;
use App\Venue;
use App\Category;
//use new events Repository
use App\repos\EventsRepository as event;


class EvntController extends Controller {

	public function __construct( Authenticator $auth, event $event){
		$this->beforefilter('auth',['except'=>['index','show','category']]);
		$this->user = $auth;
		$this->event = $event;
		
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()

	{
		
		$categories = Category::orderBy('categoryName','asc')->take('9')->get();
		$data = $this->event->getActiveEvents();
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
		$user = $this->user;
		$data = $this->event->storeEvent($request, $user);		
		return \Redirect::route('show.event',[$data->slug])->with('message','Event posted..yayyyyy.');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$data = $this->event->getEventBySlug($slug);
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
		//update event
		$data = $this->event->updateEvent($request,$slug);		
		return \Redirect::route('show.event',[$data->slug])->with('message','Event Updated..yayyyyy.');
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
		$this->event->deleteEvent($slug);
		return \Redirect::route('dashboard')->with('message','Event deleted');
	}

		public function restore($slug)
	{
		//
		$this->event->restoreEvent($slug);
		return \Redirect::route('dashboard')->with('message','Event restored');
	}
	//mark all event as expired
	public function expire()
	{
		 return $this->event->expireEvent();
	}

	/**
	 * Event Category
	 * @param  [type] $slug
	 * @return [type]
	 */
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
