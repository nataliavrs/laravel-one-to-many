<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $emps = Employee::all();

        return view('pages.index', compact(['emps']));

    }
}
