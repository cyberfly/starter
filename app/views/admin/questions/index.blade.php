@extends('admin.layouts.default')

@section('content')

<div class="page-header">
		<h3>
			Question Management
			<div class="pull-right">
				<a class="btn btn-small btn-info iframe cboxElement" href="{{ URL::to('admin/questions/create') }}"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
			<th>
        No
      </th>
      <th>
        Question Content
      </th>
      <th>
        Question Image
      </th>
			<th>
        Question Section
      </th>
      <th>
        Question Language
      </th>
			<th>
        Username
      </th>
			<th>
				Action
			</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($questions as $key => $question)
    <tr>
      <td>
				{{ $key + 1}}
      </td>
			<td>
        {{{ $question->question_content }}}
      </td>
      <td>
      {{{ $question->question_image }}}
      </td>
			<td>
      {{{ $question->question_section }}}
      </td>
      <td>
      {{{ $question->question_language }}}
      </td>
			<td>
      {{{ $question->user->username }}}
      </td>
			<td>
				{{ link_to_route('admin.questions.edit', 'Edit', array($question->id), array('class'=>'btn btn-default btn-xs')) }}

				{{ Form::open(array('route' => array('admin.questions.destroy', $question->id), 'method'=> 'delete' )) }}

				{{ Form::submit('Delete',array('class'=>'btn btn-xs btn-danger')) }}

				{{ Form::close() }}
			</td>
    </tr>
    @endforeach
  </tbody>

</table>

{{ $questions->links() }}

@stop

@stop
