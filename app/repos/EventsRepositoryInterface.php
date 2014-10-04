<?php namespace App\repos;

	interface EventsRepositoryInterface{

		public function getActiveEvents();
		public function getEventBySlug($slug);
		public function storeEvent($request,$user);
		public function updateEvent($request,$lug);
		public function deleteEvent($slug);
		public function expireEvent();
		public function restoreEvent($slug);
	}
	


