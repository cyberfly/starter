<?php

class AdminQuestionsController extends \BaseController {

	/**
	 * Display a listing of questions
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::orderBy('id', 'DESC')->paginate(1);

		// var_dump($questions->toArray());
		// exit;

		return View::make('admin.questions.index', compact('questions'));
	}

	/**
	 * Show the form for creating a new question
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.questions.create');
	}

	/**
	 * Store a newly created question in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// run the validation
		$validator = Validator::make($data = Input::all(), Question::$rules);
		//
		if ($validator->fails()) //jika validation failed
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else { //jika validation pass

			// start upload question_image

			$file               = Input::file('question_image');
	    $destinationPath    = 'uploads/questions';

	    // Client file name, including the extension of the client
	    $fullname           = $file->getClientOriginalName();
			$uniqid = uniqid('', true);

	    // Hash processed file name, including the real extension
	    $question_image_filename           = $uniqid.'_'.$fullname;
	    $upload_success     = Input::file('question_image')->move($destinationPath, $question_image_filename);

			//insert question into database

			$question = new Question;
			$question->question_content = Input::get('question_content');
			$question->question_section = Input::get('question_section');
			$question->correct_option = Input::get('correct_option');
			$question->question_language = Input::get('question_language');

			if ($upload_success) {
				$question->question_image = $question_image_filename;
			}
			else {
				$question->question_image = '';
			}

			for ($i=1; $i <=4 ; $i++) {

				// save option content

				$option_content_key = "option_content_".$i;

				$question->$option_content_key = Input::get($option_content_key);

				// upload option image

				$option_image_key = "option_image_".$i;

				if (Input::hasFile($option_image_key))
				{
						// start upload question_image

						$file               = Input::file($option_image_key);

				    // Client file name, including the extension of the client
				    $fullname           = $file->getClientOriginalName();
						$uniqid = uniqid('', true);

				    // Hash processed file name, including the real extension
				    $option_image_filename           = $uniqid.'_'.$fullname;
				    $upload_success     = Input::file($option_image_key)->move($destinationPath, $option_image_filename);

						if ($upload_success) {
							$question->$option_image_key = $option_image_filename;
						}
						else {
							$question->$option_image_key = '';
						}
				}

			}

			$question->save();

			return Redirect::route('admin.questions.index');

		}

		// end of else

	}

	/**
	 * Display the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::findOrFail($id);

		return View::make('admin.questions.show', compact('question'));
	}

	/**
	 * Show the form for editing the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::find($id);

		$user = $question->user;
		var_dump($user);
		// $question = Question::find($id)->user()->get();
		// $username = Question::find($id)->user->username;

		// var_dump($question->toArray());
		// var_dump($username);
		// exit;

		return View::make('admin.questions.edit', compact('question'));
	}

	/**
	 * Update the specified question in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$question = Question::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Question::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {

			$question = Question::findOrFail($id);

			$question->question_content = Input::get('question_content');
			$question->question_section = Input::get('question_section');
			$question->correct_option = Input::get('correct_option');
			$question->question_language = Input::get('question_language');

			if (Input::hasFile('question_image'))
			{
					// start upload question_image

					$file               = Input::file('question_image');
					$destinationPath    = 'uploads/questions';

					// Client file name, including the extension of the client
					$fullname           = $file->getClientOriginalName();
					$uniqid = uniqid('', true);

					// Hash processed file name, including the real extension
					$question_image_filename           = $uniqid.'_'.$fullname;
					$upload_success     = Input::file('question_image')->move($destinationPath, $question_image_filename);

					//

					if ($upload_success) {
						$question->question_image = $question_image_filename;
					}
			}

			for ($i=1; $i <=4 ; $i++) {

				// save option content

				$option_content_key = "option_content_".$i;

				$question->$option_content_key = Input::get($option_content_key);

				// upload option image

				$option_image_key = "option_image_".$i;

				// start upload question_image

				if (Input::hasFile($option_image_key))
				{
						$file               = Input::file($option_image_key);

						// Client file name, including the extension of the client
						$fullname           = $file->getClientOriginalName();
						$uniqid = uniqid('', true);

						// Hash processed file name, including the real extension
						$option_image_filename           = $uniqid.'_'.$fullname;
						$upload_success     = Input::file($option_image_key)->move($destinationPath, $option_image_filename);

						if ($upload_success) {
							$question->$option_image_key = $option_image_filename;
						}
						else {
							$question->$option_image_key = '';
						}
				}

			}

			$question->save();

		}

		return Redirect::route('admin.questions.index');
	}

	/**
	 * Remove the specified question from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Question::destroy($id);

		return Redirect::route('admin.questions.index');
	}

}
