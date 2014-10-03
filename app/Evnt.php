<?php namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletingTrait;
	class Evnt extends Model {

		public $fillable = ['name','venue_id','when','detail','end','category_id','flyer','cover','info','slug'];
		use SoftDeletingTrait;
		//lets try again....
		protected $dates = 'deleted_at';
		protected $table = 'events';
		public function getDates(){
			return ['created_at','updated_at','when','end'];
		}

        public function scopeAllEvents($query){
        	return $query->whereExpire(false);
        }

        public function scopeSearch($query, $search){
        	return $query->where('name','LIKE', "%$search%");
        }
		public function user(){
			return $this->belongsTo('\App\User');
		}

		public function venue(){
			return $this->belongsTo('\App\Venue');
		}

		public function category(){
    		return $this->belongsTo('\App\Category');
    	}

	}