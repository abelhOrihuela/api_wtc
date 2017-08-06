<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Token;
use App\Company;
use Mail;

class TokensController extends Controller
{
    public function index(Request $request){
      $token=Token::where('token', '=', $request->token)->first();

      $token->company;

      return $token;
    }

    public function send_tokens(){

      $tokens=Token::all();
      $company=Company::where('id', '=', 1)->first();

      foreach ($tokens as $token) {
        Mail::send('emails.engagement', [ 'link' => 'http://localhost:8080/#/public/survey/'.$token->token, 'company' => $company], function($message) use ($token, $company){
          $message->from('abelorihuela@wtc-talent.com', 'Encuesta '.$company->name);
          $message->to($token->email, 'Buenas Tardes ...')->subject('WTC');
        });

      }




      return "Enviado";

    }
}
