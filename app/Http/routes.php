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

  /****************************    PUBLIC ************************/
  Route::post('signin', [
    'uses' => 'Auth\AuthController@signin',
  ]);

  Route::get('tokenEngagement',[
    'uses' => 'TokensController@show'
  ]);

  Route::get('educationLevels', [
    'uses' => 'EducationalLevelsController@index'
  ]);

  Route::get('workAreas',[
    'uses' => 'WorkAreasController@index'
  ]);

  Route::post('employeeEngagement',[
    'uses' => 'EmployeeEngagementsController@store'
  ]);


  Route::get('questionsSurvey',[
    'uses' => 'QuestionsController@index'
  ]);

  Route::post('questionsSurvey',[
    'uses' => 'QuestionsController@store'
  ]);


  /****************************    USER LOGGED ************************/


  Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('user', [
      'uses' => 'UserController@index',
    ]);
    Route::get('companies',[
      'uses' => 'CompaniesController@index'
    ]);

    /***  SURVEY ***/

    Route::get('surveys',[
      'uses' => 'SurveyController@index'
    ]);

    Route::put('survey',[
      'uses' => 'SurveyController@update'
    ]);

    Route::delete('survey',[
      'uses' => 'SurveyController@destroy'
    ]);

    Route::post('survey',[
      'uses' => 'SurveyController@store'
    ]);

    Route::get('questions',[
      'uses' => 'QuestionsController@show'
    ]);

    Route::post('question',[
      'uses' => 'QuestionsController@add'
    ]);

    Route::put('question',[
      'uses' => 'QuestionsController@update'
    ]);

    Route::delete('question',[
      'uses' => 'QuestionsController@destroy'
    ]);

    Route::get('tokens',[
      'uses' => 'TokensController@index'
    ]);

    Route::post('token',[
      'uses' => 'TokensController@store'
    ]);

    Route::delete('token',[
      'uses' => 'TokensController@destroy'
    ]);

    Route::get('sendtokens',[
      'uses' => 'TokensController@send_tokens'
    ]);

    Route::get('questionsCategories',[
      'uses' => 'QuestionCategoriesController@index'
    ]);

    Route::get('questionCategory',[
      'uses' => 'QuestionCategoriesController@show'
    ]);

    Route::get('statisticsQuestionsCategories',[
      'uses' => 'QuestionCategoriesController@statisticsQuestionsCategories'
    ]);

    Route::get('questionsOfCategory',[
      'uses' => 'QuestionCategoriesController@questionsOfCategory'
    ]);

    Route::get('statisticsQuestion',[
      'uses' => 'QuestionCategoriesController@statisticsQuestion'
    ]);

  });

});
