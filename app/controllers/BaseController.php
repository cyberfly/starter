<?php

class BaseController extends Controller {

    /**
     * Initializer.
     *
     * @access   public
     * @return \BaseController
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->getUserInfo();
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

  protected function getUserInfo()
	{
		$this->the_user = new User;

    if (Auth::check())
    {
      $user = Auth::user();
      $this->the_user->id = $user->id;
      $this->the_user->username = $user->username;
      $this->the_user->email = $user->email;

      if (Entrust::hasRole('admin'))
      {
        $this->the_user->full_name = '';
        $this->the_user->ic = '';
        $this->the_user->phone = '';
        $this->the_user->approved_site_id = '';
      }
      else if (Entrust::hasRole('supervisor'))
      {
          $supervisor = Supervisor::with('supervisor_info')->find($user->id);
          $this->the_user->full_name = $supervisor->supervisor_info->supervisor_name;
          $this->the_user->ic = $supervisor->supervisor_info->supervisor_ic;
          $this->the_user->phone = $supervisor->supervisor_info->supervisor_phone;
          $this->the_user->approved_site_id = $supervisor->supervisor_info->approved_site_id;
      }
      else if (Entrust::hasRole('candidate')){
          $candidate = Candidate::with('candidate_info')->find($user->id);
          $this->the_user->full_name = $candidate->candidate_info->candidate_name;
          $this->the_user->ic = $candidate->candidate_info->candidate_ic;
          $this->the_user->phone = $candidate->candidate_info->candidate_phone;
          $this->the_user->approved_site_id = $candidate->candidate_info->approved_site_id;
      }

      // now you can get user info in other controller using this function

      // echo $this->the_user->full_name;

      // share variable to view

      View::share ( 'the_user', $this->the_user );

      // now you can use the_user in view using this syntax
      // {{ $the_user->username }}


    }
    else {

    }

    return $this->the_user;
	}

}
