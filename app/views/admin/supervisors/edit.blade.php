@extends('admin.layouts.default')

@section('content')

<div class="row">
  <div class="col-md-6">

	<!-- paste your content here  -->

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	<div class="page-header">
			<h3>
				Edit Supervisor
				<div class="pull-right">
					<a class="btn btn-small btn-default iframe cboxElement" href="{{ URL::to('admin/supervisors') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
				</div>
			</h3>
		</div>

    {{ Form::open(array('route' => array('admin.supervisors.update', $supervisor->id), 'method'=>'PUT')) }}

    <div class="form-group">

      {{ Form::label('approved_site_id', 'Approved Sites') }}
      {{ Form::select('approved_site_id', $approvedsites, $supervisor->supervisor_info->approved_site_id, array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

	    {{ Form::label('username', 'Username') }}
	    {{ Form::text('username',$supervisor->username,array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('password', 'Password') }}
	    {{ Form::password('password',array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('password_confirmation', 'Password Confirm') }}
	    {{ Form::password('password_confirmation',array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('email', 'Email') }}
	    {{ Form::text('email', $supervisor->email, array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('supervisor_name', 'Supervisor Name') }}
	    {{ Form::text('supervisor_name',$supervisor->supervisor_info->supervisor_name,array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('supervisor_ic', 'Supervisor IC') }}
	    {{ Form::text('supervisor_ic',$supervisor->supervisor_info->supervisor_ic,array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('supervisor_phone', 'Supervisor Phone') }}
	    {{ Form::text('supervisor_phone',$supervisor->supervisor_info->supervisor_phone,array('class'=>'form-control')) }}

	  </div>

	  {{ Form::submit('Submit Form',array('class'=>'btn btn-primary')) }}
    {{ Form::reset('Reset',array('class'=>'btn btn-default')) }}


	{{ Form::close() }}

	<!-- end of paste content -->

	</div>

</div>



@stop

@stop
