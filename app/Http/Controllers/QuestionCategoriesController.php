<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\QuestionCategory;
use App\Question;
use DB;

class QuestionCategoriesController extends Controller
{
  public function index(){
    $categories = QuestionCategory::all();

    return $categories;
  }


  public function show(Request $request){


    $questions = DB::table('questions')
    ->join('question_categories', 'questions.question_category_id', '=', 'question_categories.id')
    ->select('questions.*','question_categories.name as category')
    ->where('question_categories.id', $request->id)
    ->get();

    return $questions;
  }

  public function showDetailCuestion(Request $request){
    $statement = "SELECT COUNT(*) data,
    question_employees.value,
    questions.description,
    question_categories.id,
    CASE question_employees.value
    WHEN 1 THEN 'Absoluto desacuerdo'
    WHEN 2 THEN 'En desacuerdo'
    WHEN 3 THEN 'Un poco de acuerdo'
    WHEN 4 THEN 'De acuerdo'
    WHEN 5 THEN 'Muy de acuerdo'
    WHEN 6 THEN 'Absolutamente de acuerdo'
    ELSE 'more'
    END as respuesta,
    CASE question_employees.value
    WHEN 1 THEN '#FF6E40'
    WHEN 2 THEN '#1565C0'
    WHEN 3 THEN '#FFFF00'
    WHEN 4 THEN '#76FF03'
    WHEN 5 THEN '#7E57C2'
    WHEN 6 THEN '#FF9800'
    ELSE 'more'
    END as color
    FROM questions INNER JOIN question_employees ON questions.id=question_employees.question_id
    INNER JOIN question_categories ON questions.question_category_id=question_categories.id
    WHERE questions.id=".$request->id." GROUP by question_employees.value";

    $result=DB::select(DB::raw($statement));
    return $result;
  }
}
