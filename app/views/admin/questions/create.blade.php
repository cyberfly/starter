@extends('admin.layouts.default')

@section('content')

<div class="row">
  <div class="col-md-12">

	<!-- paste your content here  -->

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}

	<div class="page-header">
			<h3>
				Add Question
				<div class="pull-right">
					<a class="btn btn-small btn-default iframe cboxElement" href="{{ URL::to('admin/questions') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
				</div>
			</h3>
		</div>

	{{ Form::open(array('route' => 'admin.questions.store', 'files'=>true)) }}

	  <div class="form-group">

	    {{ Form::label('question_content', 'Question Content') }}
	    {{ Form::textarea('question_content','',array('class'=>'form-control full-width wysihtml5')) }}

	  </div>

    <div class="row">
      <div class="col-md-3">

        <div class="form-group">

    	    {{ Form::label('correct_option', 'Correct Answer Option') }}
    	    {{ Form::select('correct_option', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'), '', array('class'=>'form-control')) }}

    	  </div>
      </div>
      <div class="col-md-3">

        <div class="form-group">

    	    {{ Form::label('question_section', 'Question Section') }}
    	    {{ Form::select('question_section', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'), '', array('class'=>'form-control')) }}

    	  </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">

    	    {{ Form::label('question_language', 'Question Language') }}
    	    {{ Form::select('question_language', array('BM' => 'BM', 'BI' => 'BI'), '', array('class'=>'form-control')) }}

    	  </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">

          {{ Form::label('question_image', 'Question Image') }}

          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
            <div>
              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{ Form::file('question_image','',array('class'=>'form-control')) }}</span>
              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
          </div>

        </div>
      </div>
    </div>

    @for ($i = 1; $i < 5; $i++)

    <?php

    $option_content = 'option_content_'.$i;
    $option_image = 'option_image_'.$i;

     ?>

    <hr>
    <h3>Answer Option {{ $i }}</h3>

    <div class="row">
      <div class="col-md-9">

        {{ Form::label($option_content, 'Question Option Content') }}
        {{ Form::textarea($option_content,'',array('class'=>'form-control full-width wysihtml5')) }}

      </div>
      <div class="col-md-3">

        {{ Form::label($option_image, 'Question Option Image') }}


        <div class="fileinput fileinput-new" data-provides="fileinput">
          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
          <div>
            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{ Form::file($option_image,'',array('class'=>'form-control')) }}</span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>

      </div>
    </div>

    @endfor

    <div class="row">
        <div class="col-md-3">
            {{ Form::submit('Submit Form',array('class'=>'btn btn-primary')) }}
        </div>
    </div>




	{{ Form::close() }}

	<!-- end of paste content -->

	</div>

</div>



@stop

@stop
