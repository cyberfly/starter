@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<div class="row">
		<div class="col-md-8">

			<div id="example-basic">

					@foreach ($questions as $key => $question)

					<h3>Question</h3>
					<section>
							{{ String::tidy($question->question_content) }}
							@if(!empty($question->question_image))
								<img src="{{asset('uploads/questions/').'/'.$question->question_image}}" width="400">
							@endif
							<div class="question_choice">

								<ol type="A">
									<li>
										{{ String::tidy($question->option_content_1) }}
										@if(!empty($question->option_image_1))
										<img src="{{ asset('uploads/questions/').'/'.$question->option_image_1 }}" width="200">
										@endif{{ Form::radio('question_choice_'.$question->id, 'A') }}
									</li>

									<li>{{ String::tidy($question->option_content_2) }}
										 @if(!empty($question->option_image_2))
										 <img src="{{ asset('uploads/questions/').'/'.$question->option_image_2 }}" width="200">
										 @endif
										 {{ Form::radio('question_choice_'.$question->id, 'B') }}
									</li>
									<li>{{ String::tidy($question->option_content_3) }}
										@if(!empty($question->option_image_3))
											<img src="{{ asset('uploads/questions/').'/'.$question->option_image_3 }}" width="200">
										 @endif
										 {{ Form::radio('question_choice_'.$question->id, 'C') }}
									 </li>
									<li>{{ String::tidy($question->option_content_4) }}
										@if(!empty($question->option_image_4))
											<img src="{{ asset('uploads/questions/').'/'.$question->option_image_4 }}" width="200">
										 @endif
										{{ Form::radio('question_choice_'.$question->id, 'D') }}
									</li>
								</ol>

							</div>
					</section>


					@endforeach
			</div>

		</div>
		<div class="col-md-4">
			<div class="right_sidebar" style="background:#F4F4F4;min-height:500px;padding:40px;">
				<h3>Exam Info</h3>
				<p>
					Hi, <strong>{{ $the_user->full_name }}</strong>
				</p>
				<p>
					Answered Question: 13 / 70
				</p>
				<p>
					Mark Question: 5 / 70
				</p>
			</div>
		</div>
</div>





@stop

@section('scripts')

<script type="text/javascript">

$("#example-basic").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true
});

</script>

@stop
