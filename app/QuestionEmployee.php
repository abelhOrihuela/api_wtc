<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionEmployee extends Model
{
    //
    protected $fillable = ['question_id', 'employee_id', 'value'];

}
