@extends('admin.layouts.default')

@section('content')

<div class="page-header">
		<h3>
			Approved Sites Management

			<div class="pull-right">
				<a class="btn btn-small btn-info iframe cboxElement" href="{{ URL::to('admin/approvedsites/create')}}"><span class="glyphicon glyphicon-plus-sign"></span> Add</a>
			</div>
		</h3>
	</div>


	<div class="search_box">
			{{ Form::open(array('route' => 'admin.approvedsites.index','method'=>'GET')) }}
			<div class="row">
				<div class="col-md-4">
					{{Form::label('state', 'Search Approved Sites By State')}}
					{{ Form::select('state', $states, Input::get('state') ,array('class'=>'form-control'))}}
				</div>
				<div class="col-md-4">
					{{Form::label('state', 'Search Approved Sites By State')}}
					{{ Form::text('site_name', Input::get('site_name') , array('class'=>'form-control','placeholder'=>'Enter site name'))}}
				</div>
				<div class="col-md-4">
						<br>
							{{ Form::submit('Search',array('class'=>"btn btn-danger")) }}

				</div>
			</div>
			{{ Form::close() }}
	</div>


	<div class="col-md-4">
	<div class="form-group">



	</div>
	</div>


<table class= "table table-bordered table-striped table-hover"  >
  <thead>
    <tr>
			<th> No </th>
      <th> Approved Site Code </th>
      <th> Approved Site </th>
      <th> Address </th>
      <!-- <th> Alamat 2</th>
      <th> Alamat 3</th>
      <th> Bandar </th>
      <th> Poskod </th>
      <th> Negeri </th> -->
      <th> Telephone No </th>
      <th> Fax No </th>
      <th> Email </th>
      <th>  </th>
    </tr>

  </thead>

<tbody>

@foreach ($approvedsites as  $key=>$approvedsite)
<tr>
		<td>
			{{ $key + 1}}
		</td>
  <td>
    {{{ $approvedsite->agcode }}}
  </td>
  <td>
    {{{ $approvedsite->agname }}}
  </td>
  <td>
    {{{ $approvedsite->add1.' '.$approvedsite->add2.' '.$approvedsite->add3.' '.$approvedsite->postcode.' '.$approvedsite->city.' '.$approvedsite->desc1.', '.$approvedsite->refs->desc1 }}}
  </td>
  <!-- <td>
    {{{ $approvedsite->add2 }}}
  </td>
  <td>
    {{{ $approvedsite->add3 }}}
  </td>
  <td>
    {{{ $approvedsite->city }}}
  </td>
  <td>
    {{{ $approvedsite->postcode }}}
  </td>
  <td>
    {{{ $approvedsite->state }}}
  </td> -->
  <td>
    {{{ $approvedsite->tel }}}
  </td>
  <td>
    {{{ $approvedsite->fax }}}
  </td>
  <td>
    {{{ $approvedsite->email }}}
  </td>
	<td>
		<div class="dropdown">
		<a class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" title="Klik untuk fungsi">
				<span class="glyphicon glyphicon-align-justify"></span>
		</a>
		<ul class="dropdown-menu pull-right" role="menu">


				<li class="popover-title" style="border-top: 1px solid #e5e5e5; line-height: 10px; margin: -0.5em 0 0">Pilih Fungsi</li>

				{{ link_to_route('admin.approvedsites.edit', 'Edit', array($approvedsite->id), array('class'=>'btn btn-link')) }}
				<?php
				$form_id = 'form_'.$approvedsite->id;
				$button_id = 'button_'.$approvedsite->id;
				  ?>
				{{ Form::open(array('route' => array('admin.approvedsites.destroy', $approvedsite->id), 'method'=> 'delete','id'=>$form_id )) }}

				{{ Form::submit('Delete',array('class'=>'btn btn-link delete','id'=>$button_id)) }}

				{{ Form::close() }}

		</ul>
		</div>
	</td>
</tr>

@endforeach
</tbody>
</table>

<?php
	// echo $approvedsites->links();
	echo $approvedsites->appends(Request::except('page'))->links();
?>
@stop
@stop
