@extends('admin.layouts.default')

@section('content')

<div class="row">
  <div class="col-md-12">

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

	{{ Form::open(array('route' => 'admin.candidates.store', 'files'=>true)) }}

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

	    {{ Form::label('candidate_phone', 'candidate_phone') }}
	    {{ Form::text('candidate_phone','',array('class'=>'form-control')) }}

	  </div>

    <div class="row">
      <div class="col-md-3">

        <div class="form-group">

    	    {{ Form::label('correct_option', 'Correct Answer Option') }}
    	    {{ Form::select('correct_option', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'), '', array('class'=>'form-control')) }}

    	  </div>
      </div>

    </div>




	  {{ Form::submit('Submit Form',array('class'=>'btn btn-primary')) }}

	{{ Form::close() }}

	<!-- end of paste content -->

	</div>

</div>



@stop

@stop
