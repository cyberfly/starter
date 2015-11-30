@extends('admin.layouts.default')

@section('content')

<div class="page-header">
		<h3>
			Supervisor Management
			<div class="pull-right">
        <a class="btn btn-small btn-info iframe cboxElement" href="{{ URL::to('admin/supervisors/create') }}"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

  <div class="search_box" style="margin-bottom:30px;">
    {{ Form::open(array('route' => 'admin.supervisors.index', 'method'=>'GET')) }}
    <div class="row">
      <div class="col-lg-2">
        {{ Form::text('supervisor_ic',Input::get('supervisor_ic'),array('class'=>'form-control','placeholder'=>'Enter Supervisor IC')) }}
      </div>
      <div class="col-lg-2">
        {{ Form::text('supervisor_name',Input::get('supervisor_name'),array('class'=>'form-control','placeholder'=>'Enter Supervisor Name')) }}
      </div>
			<div class="col-lg-2">
        {{ Form::text('supervisor_email',Input::get('supervisor_email'),array('class'=>'form-control','placeholder'=>'Enter Supervisor Email')) }}
      </div>
			<div class="col-lg-3">
				@if (Entrust::hasRole('admin'))

				{{ Form::select('supervisor_site', $approvedsites, Input::get('supervisor_site'), array('class'=>'form-control')) }}

				@endif
      </div>
      <div class="col-lg-2">
        {{ Form::submit('Search Supervisor',array('class'=>'btn btn-primary')) }}
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
        Supervisor Name
      </th>
      <th>
        Supervisor IC
      </th>
      <th>
        Supervisor Phone
      </th>
      <th>
        Approved Site
      </th>
			<th>
        Supervisor Username
      </th>
      <th>
        Supervisor Email
      </th>
			<th>
				Action
			</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($supervisors as $key => $supervisor)
    <tr>
      <td>
				{{ $key + 1}}
      </td>
			<td>
        {{{ $supervisor->supervisor_info->supervisor_name }}}
      </td>
      <td>
      {{{ $supervisor->supervisor_info->supervisor_ic }}}
      </td>
			<td>
      {{{ $supervisor->supervisor_info->supervisor_phone }}}
      </td>
      <td>
			{{{ $supervisor->supervisor_info->site_info->agname }}}
      </td>
      <td>
      {{{ $supervisor->username }}}
      </td>
			<td>
      {{{ $supervisor->email }}}
      </td>
			<td>
				{{ link_to_route('admin.supervisors.edit', 'Edit', array($supervisor->id), array('class'=>'btn btn-default btn-xs')) }}

        <?php
				$form_id = 'form_'.$supervisor->id;
				$button_id = 'button_'.$supervisor->id;
				  ?>


				{{ Form::open(array('route' => array('admin.supervisors.destroy', $supervisor->id), 'method'=> 'delete','id'=>$form_id )) }}

				{{ Form::submit('Delete',array('class'=>'btn btn-xs btn-danger delete','id'=>$button_id)) }}

				{{ Form::close() }}
			</td>
    </tr>
    @endforeach
  </tbody>

</table>

{{ $supervisors->appends(Request::except('page'))->links() }}

@stop

@stop
