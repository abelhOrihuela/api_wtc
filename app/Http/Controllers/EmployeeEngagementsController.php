<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EmployeeEngagement;
use App\Token;

class EmployeeEngagementsController extends Controller
{
  public function store(Request $request){

    $input=$request->all();

    $validator = \Validator::make($input,array(
      'gender' => 'required|max:1',
      'years_of_service' => 'required|max:2',
      'age' => 'required|max:2',
      'educational_level_id' => 'required|max:3',
      'token_id' => 'required|max:25',
      'work_area_id' => 'required|max:3',
    ));


    if ($validator->fails()){
      $messages = $validator->messages();
      return response()->json($messages, 400);
    }else{
      $employee = EmployeeEngagement::create($input);

      $token=Token::where('id', '=', $request->token_id)->first();
      if($token->update(['status' => true])){
        return $employee;
      }
    }
  }
}
