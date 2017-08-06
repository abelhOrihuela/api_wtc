<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEngagement extends Model
{
     protected $fillable = ['gender', 'years_of_service', 'age', 'educational_level_id', 'token_id', 'work_area_id'];

/*

     $table->string('gender');
     $table->integer('');
     $table->integer('')->default(null);
     $table->integer('');
     $table->integer('');
     $table->integer('');
     */
}
