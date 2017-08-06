<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
  protected $hidden = [
      'email', 'created_at', 'updated_at'
  ];

  public function company(){
    return $this->belongsTo('App\Company', 'company_id', 'id');
  }

}
