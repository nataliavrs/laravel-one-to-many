<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use App\Location;
use Illuminate\Http\Request;

class MainController extends Controller
{   
    // page - index
    public function index(){
        $emps = Employee::all();
        return view('pages.index', compact(['emps']));
    }
    // page - employee info
    public function empShow($id){
        $emp = Employee::findOrFail($id);
        return view('pages.emp-show', compact(['emp']));
    }
    // page - create task form
    public function taskCreate(){
        // return emps array to have in select
        $emps = Employee::all();
        return view('pages.create-task', compact(['emps']));
    }
    // create new task
    public function taskStore(Request $request){
        // dd($request -> all());
        $newTask = Task::make($request -> all());
        $emp = Employee::findOrFail($request -> get('emp_id'));
        $newTask -> employee() -> associate($emp);
        $newTask -> save();
        
        return redirect() -> route('index');
        // dd($newTask);
    }
    // update (edit) task page
    public function taskUpdatePage($id) {
        $emps = Employee::all();
        $task = Task::findOrFail($id);
        
        return view('pages.update-task', compact(['task', 'emps']));
    }
    // update (edit) task
    public function taskUpdate(Request $request, $id) {
        
        $data = $request -> all();

        // $emps = Employee::all();
        $task = Task::findOrFail($id);
        $task -> update($data);
        
        return redirect() -> route('index');
    }
    // locations index
    public function indexLocation() {
        $locations = Location::all();        
        return view('pages.loc-index', compact(['locations']));
    }
    // locations show
    public function showLocation($id) {
        $location = Location::findOrFail($id);        
        return view('pages.loc-show', compact(['location']));
    }
    
}
