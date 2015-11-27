<?php

class Ref extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'ref';
	public function approved_site()
	{
		return $this->belongsTo('Approvedsite');
	}
}
