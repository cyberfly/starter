@extends('admin.layouts.default')

@section('content')

<div class="row">
  <div class="col-md-6">

	<!-- paste your content here  -->

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	<div class="page-header">
			<h3>
				Add Candidate
				<div class="pull-right">
					<a class="btn btn-small btn-default iframe cboxElement" href="{{ URL::to('admin/candidates') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
				</div>
			</h3>
		</div>

	{{ Form::open(array('route' => 'admin.candidates.store', 'class'=>'')) }}

    <div class="form-group">

      {{ Form::label('approved_site_id', 'Approved Sites') }}
      {{ Form::select('approved_site_id', $approvedsites, '', array('class'=>'form-control')) }}

    </div>


    <div class="form-group">

	    {{ Form::label('username', 'Username') }}
	    {{ Form::text('username','',array('class'=>'form-control')) }}

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
	    {{ Form::text('email','',array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('candidate_name', 'Candidate Name') }}
	    {{ Form::text('candidate_name','',array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('candidate_ic', 'Candidate IC') }}
	    {{ Form::text('candidate_ic','',array('class'=>'form-control')) }}

	  </div>

    <div class="form-group">

	    {{ Form::label('candidate_phone', 'Candidate Phone') }}
	    {{ Form::text('candidate_phone','',array('class'=>'form-control')) }}

	  </div>




	  {{ Form::submit('Submit Form',array('class'=>'btn btn-primary')) }}
	  {{ Form::reset('Reset',array('class'=>'btn btn-default')) }}

	{{ Form::close() }}

	<!-- end of paste content -->

	</div>

</div>



@stop

@stop
