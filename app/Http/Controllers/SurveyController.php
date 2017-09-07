<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailsTokensEngagement;
use App\Http\Requests;
use App\Survey;

class SurveyController extends Controller
{

    public function index(Request $request){
      $surveys=Survey::where("company_id", $request->id )->get();

      return $surveys;
    }
    public function store(Request $request){
      $input=$request->all();

      $validator = \Validator::make($input,array(
        'company_id' => 'required',
        'description' => 'required|max:255'
      ));


      if ($validator->fails()){
          $messages = $validator->messages();
        return response(['data' => $messages], 400);
      }else{
        $survey = Survey::create($input);
        return $survey;
      }


    }


    public function destroy(Request $request){

      $survey=Survey::where('id', '=',$request->id)->first();


      if($survey->delete()){
        return response()->json([
          'status' => 200
        ]);
      }else{
        return response(['data' => "error"], 400);
      }

    }

    public function update(Request $request){
      $survey=Survey::where('id', '=',$request->id)
      ->where('status', false)
      ->first();

      if($survey){

        $job = (new SendEmailsTokensEngagement($survey->company_id))->delay(60000 * 5);
        $this->dispatch($job);
        $survey->status=true;

        $survey->update(['status' => true ]);
        return response(['Programada' => $survey], 400);

      }else{
          return response(['data' => "Esta encuesta ya ha sido enviada."], 400);

      }


      //
      // if($survey->delete()){
      //   return response()->json([
      //     'status' => 200
      //   ]);
      // }else{
      //   return response(['data' => "error"], 400);
      // }


    }


}
