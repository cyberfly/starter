<?php

class ExamController extends \BaseController {

	/**
	 * Display a listing of questions
	 *
	 * @return Response
	 */
	public function index()
	{
		// get value from url to search

		$question_section = Input::get('question_section');
		$question_language = Input::get('question_language');

		$filter_data = array('question_section' => $question_section,
												'question_language' => $question_language
											 );

		$questions = Question::orderBy('id', 'DESC')->filter($filter_data)->get();

		// var_dump($questions->toArray());
		// exit;

		return View::make('site.exam.index', compact('questions'));
	}

	/**
	 * Show the form for creating a new question
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('exam.create');
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

			//insert question into database

			$question = new Question;
			$question->user_id = Auth::user()->id;
			$question->question_content = Input::get('question_content');
			$question->question_section = Input::get('question_section');
			$question->correct_option = Input::get('correct_option');
			$question->question_language = Input::get('question_language');

			$question->save();

			return Redirect::route('exam.index');

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

		return View::make('exam.show', compact('question'));
	}

}
