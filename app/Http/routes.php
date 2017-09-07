<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('welcome');
});





Route::group(['prefix' => 'api/engagement/'], function () {

  Route::post('signin', [
    'uses' => 'Auth\AuthController@signin',
  ]);


  Route::group(['middleware' => 'jwt.auth'], function () {


    Route::get('surveys',[
      'uses' => 'SurveyController@index'
    ]);


    Route::put('survey',[
      'uses' => 'SurveyController@update'
    ]);


    Route::post('surveyAdd',[
      'uses' => 'SurveyController@store'
    ]);


    Route::get('token',[
      'uses' => 'TokensController@show'
    ]);

    Route::post('tokens',[
      'uses' => 'TokensController@store'
    ]);

    Route::get('tokens',[
      'uses' => 'TokensController@index'
    ]);


    Route::delete('tokens',[
      'uses' => 'TokensController@destroy'
    ]);

    Route::get('sendtokens',[
      'uses' => 'TokensController@send_tokens'
    ]);

    Route::get('educationLevels', [
      'uses' => 'EducationalLevelsController@index'
    ]);

    Route::get('workAreas',[
      'uses' => 'WorkAreasController@index'
    ]);

    Route::post('employeeEngagementNew',[
      'uses' => 'EmployeeEngagementsController@store'
    ]);

    Route::get('questionsSurvey',[
      'uses' => 'QuestionsController@index'
    ]);

    Route::post('questionsSurvey',[
      'uses' => 'QuestionsController@store'
    ]);

    Route::get('questions',[
      'uses' => 'QuestionsController@show'
    ]);

    Route::post('questionAdd',[
      'uses' => 'QuestionsController@add'
    ]);

    Route::put('questionEdit',[
      'uses' => 'QuestionsController@update'
    ]);

    Route::delete('questionDelete',[
      'uses' => 'QuestionsController@destroy'
    ]);

    Route::delete('surveyDelete',[
      'uses' => 'SurveyController@destroy'
    ]);



    Route::get('questionsCategories',[
      'uses' => 'QuestionCategoriesController@index'
    ]);

    Route::get('questionCategory',[
      'uses' => 'QuestionCategoriesController@show'
    ]);


    Route::get('questionStatistics',[
      'uses' => 'QuestionCategoriesController@showDetailCuestion'
    ]);




    Route::get('companies',[
      'uses' => 'CompaniesController@index'
    ]);


    Route::get('user', [
      'uses' => 'UserController@index',
    ]);
  });

});
