<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questions', function(Blueprint $table)
		{
			$table->string('question_section')->after('question_language');
			$table->string('correct_option')->after('question_section');
			$table->string('option_content_1')->after('correct_option');
			$table->string('option_content_2')->after('option_content_1');
			$table->string('option_content_3')->after('option_content_2');
			$table->string('option_content_4')->after('option_content_3');
			$table->string('option_image_1')->after('option_content_4');
			$table->string('option_image_2')->after('option_image_1');
			$table->string('option_image_3')->after('option_image_2');
			$table->string('option_image_4')->after('option_image_3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions', function(Blueprint $table)
		{
			$table->dropColumn('question_section');
			$table->dropColumn('correct_option');
			$table->dropColumn('option_content_1');
			$table->dropColumn('option_content_2');
			$table->dropColumn('option_content_3');
			$table->dropColumn('option_content_4');
			$table->dropColumn('option_image_1');
			$table->dropColumn('option_image_2');
			$table->dropColumn('option_image_3');
			$table->dropColumn('option_image_4');
		});
	}

}
