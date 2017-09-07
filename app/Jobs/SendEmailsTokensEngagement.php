<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


use App\Token;
use App\Company;
use Mail;

class SendEmailsTokensEngagement extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $company_id;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company_id)
    {
        $this->company_id=$company_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

      $tokens=Token::where("company_id", "=", $this->company_id)->get();
      $company=Company::where("id", "=", $this->company_id)->first();

      foreach ($tokens as $token) {
        Mail::send('emails.engagement', [ 'link' => 'http://localhost:8080/#/public/survey/'.$token->token, 'company' => $company], function($message) use ($token, $company){
          $message->from('abelorihuela@wtc-talent.com', 'Encuesta '.$company->name);
          $message->to($token->email, 'Buenas Tardes ...')->subject('WTC');
        });
      }
    }
}
