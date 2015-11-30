@extends('site.layouts.default')

{{-- Content --}}
@section('content')



<div id="example-basic">
		<h3>Keyboard</h3>
		<section>
				<p>Try the keyboard navigation by clicking arrow left or right!</p>
		</section>
		<h3>Effects</h3>
		<section>
				<p>Wonderful transition effects.</p>
		</section>
		<h3>Pager</h3>
		<section>
				<p>The next and previous buttons help you to navigate through your content.</p>
		</section>
</div>



    <form id="example-basic1" action="#">
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

$("#example-basic").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true
});

</script>

@stop
