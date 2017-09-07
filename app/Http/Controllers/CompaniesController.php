<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;

class CompaniesController extends Controller
{
    public function index(){
      $companies = Company::all();

      return $companies;
    }
}
