<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EducationalLevel;

class EducationalLevelsController extends Controller
{
    public function index(){
      $educationLevels= EducationalLevel::all();

      return $educationLevels;
    }
}
