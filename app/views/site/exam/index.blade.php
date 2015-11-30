@extends('site.layouts.default')

{{-- Content --}}
@section('content')

    <form id="example-basic" action="#">
        <div>

						@foreach ($questions as $key => $question)

						<h3>Account</h3>
            <section>
                <p>
                	{{ String::tidy($question->question_content) }}
                </p>
								<label for="userName">User name *</label>
                <input id="userName" name="userName" type="text" class="required">
                <label for="password">Password *</label>
                <input id="password" name="password" type="text" class="required">
                <label for="confirm">Confirm Password *</label>
                <input id="confirm" name="confirm" type="text" class="required">
                <p>(*) Mandatory</p>
            </section>

						@endforeach

            <h3>Finish</h3>
            <section>
                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
            </section>
        </div>
    </form>

@stop

@section('scripts')

<script type="text/javascript">

	$( document ).ready(function() {

		$("#example-basic").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				autoFocus: true
		});

	});

</script>

@stop
