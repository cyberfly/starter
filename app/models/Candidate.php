<?php

use Zizaco\Entrust\HasRole;

class Candidate extends \Eloquent {

	use HasRole;

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'users';

	public function candidate_info()
	{
			return $this->hasOne('Candidate_info','user_id','id');
	}

	public function scopeFilter($query,$filter_data=array())
	{
		$query->whereHas('roles', function($q){
			$q->where('name', '=' , 'candidate');
		});

		if (isset($filter_data['candidate_email']) && !empty($filter_data['candidate_email'])) {

			$candidate_email = $filter_data['candidate_email'];
			$query->where('email', '=', $candidate_email);

		}

		if (isset($filter_data['candidate_site']) && !empty($filter_data['candidate_site'])) {

			$candidate_site = $filter_data['candidate_site'];

			$query->whereHas('candidate_info', function($q) use($candidate_site){
        $q->where('approved_site_id', '=' , $candidate_site);
    	});

		}

		if (isset($filter_data['candidate_name']) && !empty($filter_data['candidate_name'])) {

			$candidate_name = $filter_data['candidate_name'];

			$query->whereHas('candidate_info', function($q) use($candidate_name){
        $q->where('candidate_name', 'LIKE' , "%$candidate_name%");
    	});

		}

		if (isset($filter_data['candidate_ic']) && !empty($filter_data['candidate_ic'])) {

			$candidate_ic = $filter_data['candidate_ic'];

			$query->whereHas('candidate_info', function($q) use($candidate_ic){
        $q->where('candidate_ic', $candidate_ic);
    	});

		}

		return $query;

	}


}
