<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\QuestionEmployee;
use DB;

class QuestionsController extends Controller
{
  public function index(){

    $questions = Question::orderBy('order')->paginate(10);

    return $questions;
  }

  public function show(){


      $questions = DB::table('questions')
      ->join('question_categories', 'questions.question_category_id', '=', 'question_categories.id')
      ->select('questions.*','question_categories.name as category')
      ->get();





    return $questions;
  }

  public function add(Request $request){

    $input=$request->all();

    $validator = \Validator::make($input,array(
      'order' => 'required|max:3',
      'question' => 'required|min:10|max:255',
      'description' => 'required|max:255'
    ));


    if ($validator->fails()){
      $messages = $validator->messages();
      return response(['data' => $messages], 400);
    }else{
      $question = Question::create($input);

      return $this->getQuestion($question->id);
    }
  }

  public function update(Request $request){

    $input=$request->all();

    $validator = \Validator::make($input,array(
      'order' => 'required|max:3',
      'question' => 'required|min:10|max:255',
      'description' => 'required|max:255'
    ));


    if ($validator->fails()){
      $messages = $validator->messages();
      return response(['data' => $messages], 400);
    }else{

      $question=Question::where('id', '=',$request->id)->first();
      if($question->update($input)){
        return $question;
      }else{
        abort(403);
      }

    }
  }

  public function destroy(Request $request){

    $question=Question::where('id', '=',$request->id)->first();


    if($question->delete()){
      return response()->json([
        'status' => 200
      ]);
    }else{
      return response(['data' => "error"], 400);
    }

  }

  public function store(Request $request){


    $employee=$request->employee_id;
    $questions=$request->questions;

    foreach ($questions as $question) {
      QuestionEmployee::create($question);
    }


    return $questions;

  }

  public function validateParams($input){

    return $validator = \Validator::make($input,array(
      'question' => 'required|min:10|max:255',
      'description' => 'required|max:255'
    ));


  }

  public function getQuestion($id){
    $questions = DB::table('questions')
    ->join('question_categories', 'questions.question_category_id', '=', 'question_categories.id')
    ->select('questions.*','question_categories.name as category')
    ->where('questions.id', $id)
    ->get();

    return $questions;
  }
}
