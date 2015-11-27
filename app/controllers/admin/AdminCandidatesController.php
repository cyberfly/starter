<?php

class AdminCandidatesController extends \BaseController {

	/**
	 * Display a listing of candidates
	 *
	 * @return Response
	 */
	public function index()
	{
		// $candidates = Candidate::all();
		// $candidates = Candidate::has('Candidate_info')->get();

		$candidate_name = Input::get('candidate_name');
		$candidate_ic = Input::get('candidate_ic');

		// $candidates = Candidate::with('candidate_info')->filter()->paginate(5);
		// $candidates = Candidate::with('candidate_info')->paginate(5);
		// $candidates = Candidate::with('candidate_info');
		$query = DB::table('users')
		         ->join('candidates_info', 'users.id', '=', 'candidates_info.user_id')
						 ->select('users.*', 'candidates_info.candidate_name', 'candidates_info.candidate_ic', 'candidates_info.candidate_phone','candidates_info.approved_site_id')
						 ;

 		if (!empty($candidate_name)) {
 			$query->where('candidate_name', 'LIKE', $candidate_name);
 		}

 		if (!empty($candidate_ic)) {
 			$query->where('candidate_ic', '=', $candidate_ic);
 		}

		$candidates = $query->paginate(5);

		// if (!empty($candidate_name)) {
		// 		$candidates = $candidates->where('candidate_name', '=', $candidate_name);
		// }
		//
		// if (!empty($candidate_ic)) {
		// 		$candidates = $candidates->where('candidates_info.candidate_ic', '=', $candidate_ic);
		// }

		return View::make('admin.candidates.index', compact('candidates'));
	}

	/**
	 * Show the form for creating a new candidate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.candidates.create');
	}

	/**
	 * Store a newly created candidate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Candidate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {

			$user = new User;
			$user->username = Input::get( 'username' );
			$user->email = Input::get( 'email' );
		  $user->password = Input::get( 'password' );
			$user->password_confirmation = Input::get( 'password_confirmation' );
			// Generate a random confirmation code
			$user->confirmation_code = md5(uniqid(mt_rand(), true));

			$user->confirmed = 1;

			// Save if valid. Password field will be hashed before save
			$user->save();

			if ( $user->id ) {

				// Save roles. Handles updating. Change to your supervisor role ID
				$supervisor_role = array(4);
				$user->saveRoles($supervisor_role);

				// save supervisor info

				$candidate_info = new Candidate_info;
				$candidate_info->user_id = $user->id;
				$candidate_info->candidate_name = Input::get( 'candidate_name' );
				$candidate_info->candidate_ic = Input::get( 'candidate_ic' );
				$candidate_info->candidate_phone = Input::get( 'candidate_phone' );

				// save candidate info

				$candidate_info->save();

			}
		}

		return Redirect::route('admin.candidates.index');
	}

	/**
	 * Display the specified candidate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$candidate = Candidate::findOrFail($id);

		return View::make('admin.candidates.show', compact('candidate'));
	}

	/**
	 * Show the form for editing the specified candidate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$candidate = Candidate::find($id);

		return View::make('admin.candidates.edit', compact('candidate'));
	}

	/**
	 * Update the specified candidate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$candidate = Candidate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Candidate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$candidate->update($data);

		return Redirect::route('admin.candidates.index');
	}

	/**
	 * Remove the specified candidate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Candidate::destroy($id);

		return Redirect::route('admin.candidates.index');
	}

}
