<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class MainController extends Controller
{   
    // index
    public function index(){
        $emps = Employee::all();
        return view('pages.index', compact(['emps']));
    }
    // employee info
    public function empShow($id){
        $emp = Employee::findOrFail($id);
        return view('pages.emp-show', compact(['emp']));
    }
}
