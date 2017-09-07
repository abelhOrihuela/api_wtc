<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Token;
use App\Company;
use Mail;
use App\Jobs\SendEmailsTokensEngagement;
use Carbon\Carbon;


class TokensController extends Controller
{
  public function index(Request $request){

    $tokens=Token::where("company_id", $request->id )->get();


    return $tokens;


  }

  public function store(Request $request){

    $input=$request->all();

    $validator = \Validator::make($input,array(
      'email' => 'required|email'
    ));


    if ($validator->fails()){
        $messages = $validator->messages();
      return response(['data' => $messages], 400);
    }else{
      // $token = Token::create($input);

      $token = new Token;
      $token->email=$request->email;
      $token->token=uniqid();
      // $token->token= hexdec( md5($request->email) );

      $token->company_id=$request->company_id;

      if($token->save()){
        return $token;

      }else{
        return response(['data' => 'Error'], 400);

      }

    }



  }

  public function show(Request $request){

    $token=Token::where('token', '=', $request->token)->where('status', false)->first();

    if($token){
      $token->company;
      return $token;
    }else{
      abort(403, 'Enlace no disponible');
    }
  }

  public function send_tokens(){

    /*$job = (new SendEmailsTokensEngagement())->delay(Carbon::now()->addMinutes(10));

    $this->dispatch($job);
    */

    $job = (new SendEmailsTokensEngagement())->delay(60000 * 5);
    $this->dispatch($job);

    return "Programada";

  }


  public function destroy(Request $request){

    $token=Token::where('id', '=',$request->id)->first();

    //$token=Token::where('id', '=', $request->token)->where('status', false)->first();

    if($token->delete()){
      return response()->json([
        'status' => 200
      ]);
    }else{
      return response(['data' => "error"], 400);
    }

  }
}
