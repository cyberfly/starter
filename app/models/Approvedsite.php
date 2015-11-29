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

	public function candidate_info()
	{
			return $this->hasMany('Candidate_info','approved_site_id','id');
	}

}
