<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\WorkArea;

class WorkAreasController extends Controller
{
    public function index(){
      $workAreas =  WorkArea::all();

      return $workAreas;
    }
}
