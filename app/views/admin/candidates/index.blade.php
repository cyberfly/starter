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
      <div class="col-lg-4">
        {{ Form::text('candidate_ic',Input::get('candidate_ic'),array('class'=>'form-control','placeholder'=>'Enter Candidate IC')) }}
      </div>
      <div class="col-lg-4">
        {{ Form::text('candidate_name',Input::get('candidate_name'),array('class'=>'form-control','placeholder'=>'Enter Candidate Name')) }}
      </div>
      <div class="col-lg-4">
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
        {{{ $candidate->candidate_name }}}
      </td>
      <td>
      {{{ $candidate->candidate_ic }}}
      </td>
			<td>
      {{{ $candidate->candidate_phone }}}
      </td>
      <td>
      {{{ $candidate->approved_site_id }}}
      </td>
      <td>
      {{{ $candidate->username }}}
      </td>
			<td>
      {{{ $candidate->email }}}
      </td>
			<td>
				{{ link_to_route('admin.candidates.edit', 'Edit', array($candidate->id), array('class'=>'btn btn-default btn-xs')) }}

				{{ Form::open(array('route' => array('admin.candidates.destroy', $candidate->id), 'method'=> 'delete' )) }}

				{{ Form::submit('Delete',array('class'=>'btn btn-xs btn-danger')) }}

				{{ Form::close() }}
			</td>
    </tr>
    @endforeach
  </tbody>

</table>

{{ $candidates->links() }}

@stop

@stop
