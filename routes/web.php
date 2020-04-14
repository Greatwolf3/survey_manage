<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/save_question', 'HomeController@save_question')->name('save_question');
Route::group([
    'middleware' => 'auth',
    'prefix' => 'questions',
], function () {
    Route::get('/', 'QuestionsController@index')
         ->name('questions.questions.index');
    Route::get('/create','QuestionsController@create')
         ->name('questions.questions.create');
    Route::get('/show/{questions}','QuestionsController@show')
         ->name('questions.questions.show');
    Route::get('/{questions}/edit','QuestionsController@edit')
         ->name('questions.questions.edit');
    Route::post('/', 'QuestionsController@store')
         ->name('questions.questions.store');
    Route::put('questions/{questions}', 'QuestionsController@update')
         ->name('questions.questions.update');
    Route::delete('/questions/{questions}','QuestionsController@destroy')
         ->name('questions.questions.destroy');
});



Route::group([
    'middleware' => 'auth',
    'prefix' => 'questions_types',
], function () {
    Route::get('/', 'Questions_typesController@index')
         ->name('questions_types.questions_types.index');
    Route::get('/create','Questions_typesController@create')
         ->name('questions_types.questions_types.create');
    Route::get('/show/{questionsTypes}','Questions_typesController@show')
         ->name('questions_types.questions_types.show');
    Route::get('/{questionsTypes}/edit','Questions_typesController@edit')
         ->name('questions_types.questions_types.edit');
    Route::post('/', 'Questions_typesController@store')
         ->name('questions_types.questions_types.store');
    Route::put('questions_types/{questionsTypes}', 'Questions_typesController@update')
         ->name('questions_types.questions_types.update');
    Route::delete('/questions_types/{questionsTypes}','Questions_typesController@destroy')
         ->name('questions_types.questions_types.destroy');
});



Route::group([
    'middleware' => 'auth',
    'prefix' => 'answers',
], function () {
    Route::get('/', 'AnswersController@index')
         ->name('answers.answers.index');

    Route::get('/create','AnswersController@create')
         ->name('answers.answers.create');
    Route::get('/show/{answers}','AnswersController@show')
         ->name('answers.answers.show');
    Route::get('/{answers}/edit','AnswersController@edit')
         ->name('answers.answers.edit');
    Route::post('/', 'AnswersController@store')
         ->name('answers.answers.store');
    Route::put('answers/{answers}', 'AnswersController@update')
         ->name('answers.answers.update');
    Route::delete('/answers/{answers}','AnswersController@destroy')
         ->name('answers.answers.destroy');
});

Route::group([
    'prefix' => 'question_answers',
], function () {
    Route::get('/', 'QuestionAnswersController@index')
         ->name('question_answers.question_answers.index');
    Route::get('/question/{id}', 'QuestionAnswersController@index_partial')
        ->name('answers.answers.index_partial');
    Route::get('/create','QuestionAnswersController@create')
         ->name('question_answers.question_answers.create');
    Route::get('/show/{questionAnswers}','QuestionAnswersController@show')
         ->name('question_answers.question_answers.show');
    Route::get('/{questionAnswers}/edit','QuestionAnswersController@edit')
         ->name('question_answers.question_answers.edit');
    Route::post('/', 'QuestionAnswersController@store')
         ->name('question_answers.question_answers.store');
    Route::put('question_answers/{questionAnswers}', 'QuestionAnswersController@update')
         ->name('question_answers.question_answers.update');
    Route::delete('/question_answers/{questionAnswers}','QuestionAnswersController@destroy')
         ->name('question_answers.question_answers.destroy');
});

Route::group([
    'prefix' => 'import_tables',
], function () {
    Route::get('/', 'ImportTablesController@index')
         ->name('import_tables.import_tables.index');
    Route::get('/create','ImportTablesController@create')
         ->name('import_tables.import_tables.create');
    Route::get('/show/{importTables}','ImportTablesController@show')
         ->name('import_tables.import_tables.show');
    Route::get('/{importTables}/edit','ImportTablesController@edit')
         ->name('import_tables.import_tables.edit');
    Route::post('/', 'ImportTablesController@store')
         ->name('import_tables.import_tables.store');
    Route::put('import_tables/{importTables}', 'ImportTablesController@update')
         ->name('import_tables.import_tables.update');
    Route::delete('/import_tables/{importTables}','ImportTablesController@destroy')
         ->name('import_tables.import_tables.destroy');
});
