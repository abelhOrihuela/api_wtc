<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $fillable = ['question', 'description', 'order', 'question_category_id'];

}
