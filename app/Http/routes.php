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

  Route::get('token',[
    'uses' => 'TokensController@index'
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

});
