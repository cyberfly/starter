<?php

// use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Approvedsite extends \Eloquent {
	// use SoftDeletingTrait;
	//
	// 		protected $dates = ['deleted_at'];
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function refs()
	{
		return $this->hasOne('Ref','code','state');
	}

	public function candidateInfo()
	{
			return $this->hasMany('Candidate_info','approved_site_id','id');
	}

	public function supervisorInfo()
	{
			return $this->hasMany('Supervisor_info','approved_site_id','id');
	}

	// use this method if you want to filter using Eloquent orm

	public function scopeFilter($query,$filter_data=array())
	{
		if (isset($filter_data['state']) && !empty($filter_data['state'])) {
				$state = $filter_data['state'];
				$query->where('state','=',$state);
		}

		if (isset($filter_data['site_name']) && !empty($filter_data['site_name'])) {
				$site_name = $filter_data['site_name'];
				$query->where('agname','LIKE',"%$site_name%");
		}

		return $query;

	}


	// use this static method if you want to use Laravel query builder not Eloquent orm

	/*

	Example use in controller

	public function index()
	{
			$state = Input::get('state');
			$site_name = Input::get('site_name');

			$filter_data = array('state' => $state,
													'site_name' => $site_name
												 );

			$approvedsites = Approvedsite::getAllApprovedSites($filter_data)->get();

			dd($approvedsites);
	}

	*/

	public static function getAllApprovedSites($filter_data=array())
	{
			$query = DB::table('approvedsites')
							->join('ref', 'approvedsites.state', '=', 'ref.code')
							->select('approvedsites.*', 'ref.desc1')
						 ;

			if (isset($filter_data['state']) && !empty($filter_data['state'])) {
					$state = $filter_data['state'];
					$query = $query->where('state','=',$state);
			}

			if (isset($filter_data['site_name']) && !empty($filter_data['site_name'])) {
					$site_name = $filter_data['site_name'];
					$query = $query->where('agname','LIKE',"%$site_name%");
			}

			return $query;
	}

}
