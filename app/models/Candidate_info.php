<?php

class Candidate_info extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'candidates_info';

	public function candidate() {
      return $this->belongsTo('Candidate');
  }

	public function site_info() {
      // return $this->belongsTo('Approvedsite');
			return $this->hasOne('Approvedsite','id','approved_site_id');
  }


}
