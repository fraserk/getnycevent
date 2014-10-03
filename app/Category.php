<?php namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	class Category extends Model {

		public $fillable = ['categoryName','slug'];

		//protected $table = 'events';
		public function Evnts(){
    		return $this->HasMany('\App\Evnt')->whereExpire(false);
    	}
    	public function scopeGetCategoryBySlug($query, $slug)
    	{
    		return $query->whereSlug($slug);
    	}


	}