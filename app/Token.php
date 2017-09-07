<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
  /*
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  */

  protected $fillable=['status', 'token', 'email', 'company_id'];

  public function company(){
    return $this->belongsTo('App\Company', 'company_id', 'id');
  }

}
