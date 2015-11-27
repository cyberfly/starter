<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Question extends \Eloquent {

	use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

	// Add your validation rules here
	public static $rules = [
		'question_content' => 'required',
		'question_image' => 'image|max:3000',
		'option_image_1' => 'image|max:3000',
		'option_image_2' => 'image|max:3000',
		'option_image_3' => 'image|max:3000',
		'option_image_4' => 'image|max:3000'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function user() { 			 
			 return $this->belongsTo('User');
  }

}
