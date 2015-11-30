<?php

class Supervisor_info extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'supervisors_info';

	public function supervisor() {
      return $this->belongsTo('Supervisor');
  }

	public function site_info() {
      // return $this->belongsTo('Approvedsite');
			return $this->hasOne('Approvedsite','id','approved_site_id');
  }


}
