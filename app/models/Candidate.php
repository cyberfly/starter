<?php

class Candidate extends \Eloquent {

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
			// return $this->hasOne('Candidate_info');
	}

	public function with_candidate_info()
	{
		DB::table('users')
					->join('candidates_info', 'users.id', '=', 'candidates_info.user_id')
					->select('users.*', 'candidates_info.candidate_name', 'candidates_info.candidate_ic', 'candidates_info.candidate_phone')
					->get();
	}

	public function search()
	{
		$candidate_name = Input::get('candidate_name');
		$candidate_ic = Input::get('candidate_ic');

		if (!empty($candidate_name)) {
			$this->where('candidate_name', '=', $candidate_name);
		}

		if (!empty($candidate_ic)) {
			$this->where('candidate_ic', '=', $candidate_ic);
		}

		return $this;

	}


}
