<?php namespace App\repos;

use App\Evnt;
use App\Venue;

	class EventsRepository implements EventsRepositoryInterface{

		//get all active events
		public function getActiveEvents(){
			$search = \Request::get('q');
			return $search ? 
				Evnt::Search($search)->AllEvents()->paginate('20') 
				: $data = Evnt::AllEvents()->orderBy('when')->paginate('20');
		}

		//Get Event by Slug
		public function getEventBySlug($slug){
			return Evnt::whereSlug($slug)->firstorfail();

		}

		//create a new Event by user.
		public function storeEvent($request,$user){

		$event = new Evnt;
		$event->name = 	$request->name;
		$event->user_id = $user->id();
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

		
		    return Venue::find($request->venue_id)->evnts()->save($event);


		}

		//Edit and event By Slug
		public function updateEvent($request,$slug){
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


					return Venue::find($request->venue_id)->evnts()->save($event);

		}

		//Delete event..
		public function deleteEvent($slug){
			$event = Evnt::whereSlug($slug)->firstorfail();
		    return $event->delete();
		}

		//expire event..
		public function expireEvent(){
			return Evnt::where('when','<', \Carbon::now())->update(['expire'=> true]);

		}

		//restore event..
		public function restoreEvent($slub){
			$event = Evnt::withTrashed()->whereSLug($slug)->firstOrFail();
			return $event->restore();

		}


	}
