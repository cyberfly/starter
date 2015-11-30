<?php

use Zizaco\Entrust\HasRole;

class Supervisor extends \Eloquent {

	use HasRole;

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'users';

	public function supervisor_info()
	{
			return $this->hasOne('Supervisor_info','user_id','id');
	}

	public function scopeFilter($query,$filter_data=array())
	{
		$query->whereHas('roles', function($q){
			$q->where('name', '=' , 'supervisor');
		});

		if (isset($filter_data['supervisor_email']) && !empty($filter_data['supervisor_email'])) {

			$supervisor_email = $filter_data['supervisor_email'];
			$query->where('email', '=', $supervisor_email);

		}

		if (isset($filter_data['supervisor_site']) && !empty($filter_data['supervisor_site'])) {

			$supervisor_site = $filter_data['supervisor_site'];

			$query->whereHas('supervisor_info', function($q) use($supervisor_site){
        $q->where('approved_site_id', '=' , $supervisor_site);
    	});

		}

		if (isset($filter_data['supervisor_name']) && !empty($filter_data['supervisor_name'])) {

			$supervisor_name = $filter_data['supervisor_name'];

			$query->whereHas('supervisor_info', function($q) use($supervisor_name){
        $q->where('supervisor_name', 'LIKE' , "%$supervisor_name%");
    	});

		}

		if (isset($filter_data['supervisor_ic']) && !empty($filter_data['supervisor_ic'])) {

			$supervisor_ic = $filter_data['supervisor_ic'];

			$query->whereHas('supervisor_info', function($q) use($supervisor_ic){
        $q->where('supervisor_ic', $supervisor_ic);
    	});

		}

		return $query;

	}


}
