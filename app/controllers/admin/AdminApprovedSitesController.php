<?php

class AdminApprovedSitesController extends \BaseController {

	/**
	 * Display a listing of approvedsites
	 *
	 * @return Response
	 */
	public function index()
	{
		$state = Input::get('state');
		$site_name = Input::get('site_name');

		$filter_data = array('state' => $state,
												'site_name' => $site_name
											 );

	  $approvedsites = Approvedsite::filter($filter_data)->paginate(2);

		$states = $this->get_states();

		return View::make('admin.approvedsites.index', compact('approvedsites','states'));
	}

	/**
	 * Show the form for creating a new approvedsite
	 *
	 * @return Response
	 */
	public function create()
	{
		$states = $this->get_states();

		return View::make('admin.approvedsites.create', compact('states'));

	}

	public function get_states()
	{
		$states = ['' => 'Select State'] + Ref::where('group_type','=','6')->lists('desc1','code');
		return $states;
	}


	/**
	 * Store a newly created approvedsite in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Approvedsite::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			$user = Auth::user();
			$approvedsite = new Approvedsite;
			$approvedsite->agcode = Input::get('agcode');
			$approvedsite->agname = Input::get('agname');
			$approvedsite->add1 = Input::get('add1');
			$approvedsite->add2 = Input::get('add2');
			$approvedsite->add3 = Input::get('add3');
			$approvedsite->city = Input::get('city');
			$approvedsite->postcode = Input::get('postcode');
			$approvedsite->state = Input::get('state');
			$approvedsite->tel = Input::get('tel');
			$approvedsite->fax = Input::get('fax');
			$approvedsite->email = Input::get('email');
			$approvedsite->create_by = $user->id;
			$approvedsite->create_dtm = Input::get('create_dtm');
			$approvedsite->lst_modif_by = $user->id;
			$approvedsite->lst_modif_dtm = Input::get('lst_modif_dtm');

			$approvedsite->save();

		// Approvedsite::create($data);

		return Redirect::route('admin.approvedsites.index');
	}
}
	/**
	 * Display the specified approvedsite.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$approvedsite = Approvedsite::findOrFail($id);

		return View::make('admin.approvedsites.show', compact('approvedsite'));
	}

	/**
	 * Show the form for editing the specified approvedsite.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$approvedsite = Approvedsite::find($id);
		$states = $this->get_states();


		return View::make('admin.approvedsites.edit', compact('approvedsite','states'));
	}

	/**
	 * Update the specified approvedsite in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$approvedsite = Approvedsite::findOrFail($id);

// var_dump ($approvedsite);
// exit;
		$validator = Validator::make($data = Input::all(), Approvedsite::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			$user = Auth::user();

			$approvedsite->agcode = Input::get('agcode');
			$approvedsite->agname = Input::get('agname');
			$approvedsite->add1 = Input::get('add1');
			$approvedsite->add2 = Input::get('add2');
			$approvedsite->add3 = Input::get('add3');
			$approvedsite->city = Input::get('city');
			$approvedsite->postcode = Input::get('postcode');
			$approvedsite->state = Input::get('state');
			$approvedsite->tel = Input::get('tel');
			$approvedsite->fax = Input::get('fax');
			$approvedsite->email = Input::get('email');
			$approvedsite->lst_modif_by = $user->id;
			$approvedsite->lst_modif_dtm = Input::get('lst_modif_dtm');

			$approvedsite->save();

		// $approvedsite->update($data);

		return Redirect::route('admin.approvedsites.index');
	}
}

	/**
	 * Remove the specified approvedsite from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// dd($id);
		Approvedsite::destroy($id);

		return Redirect::route('admin.approvedsites.index');
	}

}
