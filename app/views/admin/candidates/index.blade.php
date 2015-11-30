@extends('admin.layouts.default')

@section('content')

<div class="page-header">
		<h3>
			Candidates Management
			<div class="pull-right">
        <a class="btn btn-small btn-info iframe cboxElement" href="{{ URL::to('admin/candidates/create') }}"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

  <div class="search_box" style="margin-bottom:30px;">
    {{ Form::open(array('route' => 'admin.candidates.index', 'method'=>'GET')) }}
    <div class="row">
      <div class="col-lg-2">
        {{ Form::text('candidate_ic',Input::get('candidate_ic'),array('class'=>'form-control','placeholder'=>'Enter Candidate IC')) }}
      </div>
      <div class="col-lg-2">
        {{ Form::text('candidate_name',Input::get('candidate_name'),array('class'=>'form-control','placeholder'=>'Enter Candidate Name')) }}
      </div>
			<div class="col-lg-2">
        {{ Form::text('candidate_email',Input::get('candidate_email'),array('class'=>'form-control','placeholder'=>'Enter Candidate Email')) }}
      </div>
			<div class="col-lg-3">
				@if (Entrust::hasRole('admin'))

				{{ Form::select('candidate_site', $approvedsites, Input::get('candidate_site'), array('class'=>'form-control')) }}

				@endif
      </div>
      <div class="col-lg-2">
        {{ Form::submit('Search Candidate',array('class'=>'btn btn-primary')) }}
      </div>
    </div>
    {{ Form::close() }}

  </div>

<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
			<th>
        No
      </th>
      <th>
        Candidate Name
      </th>
      <th>
        Candidate IC
      </th>
      <th>
        Candidate Phone
      </th>
      <th>
        Approved Site
      </th>
			<th>
        Candidate Username
      </th>
      <th>
        Candidate Email
      </th>
			<th>
				Action
			</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($candidates as $key => $candidate)
    <tr>
      <td>
				{{ $key + 1}}
      </td>
			<td>
        {{{ $candidate->candidate_info->candidate_name }}}
      </td>
      <td>
      {{{ $candidate->candidate_info->candidate_ic }}}
      </td>
			<td>
      {{{ $candidate->candidate_info->candidate_phone }}}
      </td>
      <td>
			{{{ $candidate->candidate_info->site_info->agname }}}
      </td>
      <td>
      {{{ $candidate->username }}}
      </td>
			<td>
      {{{ $candidate->email }}}
      </td>
			<td>
				{{ link_to_route('admin.candidates.edit', 'Edit', array($candidate->id), array('class'=>'btn btn-default btn-xs')) }}

        <?php
				$form_id = 'form_'.$candidate->id;
				$button_id = 'button_'.$candidate->id;
				  ?>


				{{ Form::open(array('route' => array('admin.candidates.destroy', $candidate->id), 'method'=> 'delete','id'=>$form_id )) }}

				{{ Form::submit('Delete',array('class'=>'btn btn-xs btn-danger delete','id'=>$button_id)) }}

				{{ Form::close() }}
			</td>
    </tr>
    @endforeach
  </tbody>

</table>

{{ $candidates->appends(Request::except('page'))->links() }}

@stop

@stop
