<?php

class AdminCandidatesController extends \BaseController {

	/**
	 * Display a listing of candidates
	 *
	 * @return Response
	 */
	public function index()
	{
		// dd(Auth::user());

		$candidate_name = Input::get('candidate_name');
		$candidate_ic = Input::get('candidate_ic');
		$candidate_email = Input::get('candidate_email');
		$candidate_phone = Input::get('candidate_phone');
		$candidate_site = Input::get('candidate_site');

		$filter_data = array('candidate_name' => $candidate_name,
												'candidate_ic' => $candidate_ic,
												'candidate_email' => $candidate_email,
												'candidate_phone' => $candidate_phone,
												'candidate_site' => $candidate_site
											 );

		// if supervisor login, only shown his Approved Site candidate

		if (Entrust::hasRole('supervisor')) {
				$supervisor_info = Candidate::with('candidate_info')->find(Auth::user()->id);
				$filter_data['candidate_site'] = $supervisor_info->candidate_info->approved_site_id;
		}

		$candidates = Candidate::with('candidate_info.site_info')->filter($filter_data)->paginate(1);

		$approvedsites = $this->getApprovedSites();

		return View::make('admin.candidates.index', compact('candidates','approvedsites'));
	}

	private function getApprovedSites()
	{
			$approvedsites = ['' => 'Select Site'] + Approvedsite::lists('agname', 'id');

			return $approvedsites;
	}

	/**
	 * Show the form for creating a new candidate
	 *
	 * @return Response
	 */
	public function create()
	{
		$approvedsites = $this->getApprovedSites();
		// dd($approvedsites);

		return View::make('admin.candidates.create',compact('approvedsites'));
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

				// Save roles. Handles updating. Change to your candidate role ID
				// see the constant list at app/config/constants.php

				$candidate_role = Config::get('constants.CANDIDATE_ROLE');

				$user_role = array($candidate_role);

				$user->saveRoles($user_role);

				// save supervisor info

				$candidate_info = new Candidate_info;
				$candidate_info->user_id = $user->id;
				$candidate_info->approved_site_id = Input::get( 'approved_site_id' );
				$candidate_info->candidate_name = Input::get( 'candidate_name' );
				$candidate_info->candidate_ic = Input::get( 'candidate_ic' );
				$candidate_info->candidate_phone = Input::get( 'candidate_phone' );

				// save candidate info

				if($candidate_info->save())
				{
						return Redirect::route('admin.candidates.index')->with('success', 'Record successfully inserted');
				}

			}
		}

		return Redirect::route('admin.candidates.index')->with('error', 'No record inserted');
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
		$candidate = Candidate::with('candidate_info')->find($id);

		$approvedsites = $this->getApprovedSites();

		return View::make('admin.candidates.edit', compact('candidate','approvedsites'));
	}

	/**
	 * Update the specified candidate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$candidate = Candidate::with('candidate_info')->findOrFail($id);

		$validator = Validator::make($data = Input::all(), Candidate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {

			$candidate->username = Input::get( 'username' );
			$candidate->email = Input::get( 'email' );

			if ( $candidate->save() ) {

				// save supervisor info

				$candidate_info = $candidate->candidate_info;
				$candidate_info->approved_site_id = Input::get( 'approved_site_id' );
				$candidate_info->candidate_name = Input::get( 'candidate_name' );
				$candidate_info->candidate_ic = Input::get( 'candidate_ic' );
				$candidate_info->candidate_phone = Input::get( 'candidate_phone' );

				// save candidate info

				if($candidate_info->save())
				{
						return Redirect::route('admin.candidates.edit',array($id))->with('success', 'Record successfully updated');
				}

			}

		}

		return Redirect::route('admin.candidates.edit',array($id))->with('error', 'No record updated');
	}

	/**
	 * Remove the specified candidate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$candidate = Candidate::find($id);

		Candidate::destroy($id);

		$candidate->candidate_info()->delete();

		return Redirect::route('admin.candidates.index')->with('success', 'Record successfully deleted');
	}

}
