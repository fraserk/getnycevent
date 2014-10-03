<?php namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	class Venue extends Model {

		public $fillable = ['venueName','address','address2','city','state','zip','user_id'];

		//protected $table = 'events';

		public function user(){
			return $this->belongsTo('\App\User');
		}

		public function Evnts(){
    		return $this->HasMany('\App\Evnt');
    	}

    	

	}