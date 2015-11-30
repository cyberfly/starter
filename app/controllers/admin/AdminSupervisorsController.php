<?php

class AdminSupervisorsController extends \BaseController {

	/**
	 * Display a listing of supervisors
	 *
	 * @return Response
	 */
	public function index()
	{
		// dd(Auth::user());

		$supervisor_name = Input::get('supervisor_name');
		$supervisor_ic = Input::get('supervisor_ic');
		$supervisor_email = Input::get('supervisor_email');
		$supervisor_phone = Input::get('supervisor_phone');
		$supervisor_site = Input::get('supervisor_site');

		$filter_data = array('supervisor_name' => $supervisor_name,
												'supervisor_ic' => $supervisor_ic,
												'supervisor_email' => $supervisor_email,
												'supervisor_phone' => $supervisor_phone,
												'supervisor_site' => $supervisor_site
											 );

		// if supervisor login, only shown his Approved Site supervisor

		if (Entrust::hasRole('supervisor')) {
				$supervisor_info = Supervisor::with('supervisor_info')->find(Auth::user()->id);
				$filter_data['supervisor_site'] = $supervisor_info->supervisor_info->approved_site_id;
		}

		$supervisors = Supervisor::with('supervisor_info.site_info')->filter($filter_data)->paginate(1);

		// dd($supervisors->toArray());
		// $supervisors = Supervisor::with('supervisor_info')->paginate(5);
		// dd($supervisors->toArray());

		// $query = DB::table('users')
		//          ->join('supervisors_info', 'users.id', '=', 'supervisors_info.user_id')
		// 				 ->select('users.*', 'supervisors_info.supervisor_name', 'supervisors_info.supervisor_ic', 'supervisors_info.supervisor_phone','supervisors_info.approved_site_id')
		// 				 ;
		//
 	// 	if (!empty($supervisor_name)) {
 	// 		$query->where('supervisor_name', 'LIKE', $supervisor_name);
 	// 	}
		//
 	// 	if (!empty($supervisor_ic)) {
 	// 		$query->where('supervisor_ic', '=', $supervisor_ic);
 	// 	}
		//
		// $supervisors = $query->paginate(5);

		$approvedsites = $this->getApprovedSites();

		return View::make('admin.supervisors.index', compact('supervisors','approvedsites'));
	}

	private function getApprovedSites()
	{
			$approvedsites = ['' => 'Select Site'] + Approvedsite::lists('agname', 'id');

			return $approvedsites;
	}

	/**
	 * Show the form for creating a new supervisor
	 *
	 * @return Response
	 */
	public function create()
	{
		$approvedsites = $this->getApprovedSites();
		// dd($approvedsites);

		return View::make('admin.supervisors.create',compact('approvedsites'));
	}

	/**
	 * Store a newly created supervisor in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Supervisor::$rules);

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
				// see the constant list at app/config/constants.php

				$supervisor_role = Config::get('constants.SUPERVISOR_ROLE');
				$user->saveRoles($supervisor_role);

				// save supervisor info

				$supervisor_info = new Supervisor_info;
				$supervisor_info->user_id = $user->id;
				$supervisor_info->approved_site_id = Input::get( 'approved_site_id' );
				$supervisor_info->supervisor_name = Input::get( 'supervisor_name' );
				$supervisor_info->supervisor_ic = Input::get( 'supervisor_ic' );
				$supervisor_info->supervisor_phone = Input::get( 'supervisor_phone' );

				// save supervisor info

				$supervisor_info->save();

			}
		}

		return Redirect::route('admin.supervisors.index')->with('success', 'Record successfully inserted');
	}

	/**
	 * Display the specified supervisor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$supervisor = Supervisor::findOrFail($id);

		return View::make('admin.supervisors.show', compact('supervisor'));
	}

	/**
	 * Show the form for editing the specified supervisor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$supervisor = Supervisor::with('supervisor_info')->find($id);

		$approvedsites = $this->getApprovedSites();

		return View::make('admin.supervisors.edit', compact('supervisor','approvedsites'));
	}

	/**
	 * Update the specified supervisor in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$supervisor = Supervisor::with('supervisor_info')->findOrFail($id);

		$validator = Validator::make($data = Input::all(), Supervisor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {

			$supervisor->username = Input::get( 'username' );
			$supervisor->email = Input::get( 'email' );

			if ( $supervisor->save() ) {

				// save supervisor info

				$supervisor_info = $supervisor->supervisor_info;
				$supervisor_info->approved_site_id = Input::get( 'approved_site_id' );
				$supervisor_info->supervisor_name = Input::get( 'supervisor_name' );
				$supervisor_info->supervisor_ic = Input::get( 'supervisor_ic' );
				$supervisor_info->supervisor_phone = Input::get( 'supervisor_phone' );

				// save supervisor info

				$supervisor_info->save();

			}

		}

		return Redirect::route('admin.supervisors.edit',array($id))->with('success', 'Record successfully updated');
	}

	/**
	 * Remove the specified supervisor from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$supervisor = Supervisor::find($id);

		Supervisor::destroy($id);

		$supervisor->supervisor_info()->delete();

		return Redirect::route('admin.supervisors.index');
	}

}
