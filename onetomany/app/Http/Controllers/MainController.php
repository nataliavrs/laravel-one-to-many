<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use App\Location;
use App\Typology;
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

    // ##### TASKS #####
    // page - index
    public function indexTask() {
        $tasks = Task::all();
        return view('pages.task-index', compact('tasks'));
    }
    // page - show
    public function showTask($id) {
        $task = Task::findOrFail($id);
        return view('pages.task-show', compact('task'));
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
    // page - update (edit) task 
    public function taskUpdatePage($id) {
        $emps = Employee::all(); // model prende i dati dal DB, dopo nel controller chiamo il model e dopo ci lavoro
        $task = Task::findOrFail($id);
        return view('pages.update-task', compact(['task', 'emps']));
    }
    // update (edit) task
    public function taskUpdate(Request $request, $id) {
        $data = $request -> all();
        $task = Task::findOrFail($id);
        $task -> update($data);
        
        // parametri passati con array
        // redirect aggiorna url 
        return redirect() -> route('show-task', ['id' => $id]);
        // return redirect() -> route('show-task', ['id' => $id, 'altra' => $altra]);

        // non aggiorna URL
        // return view('pages.task-show', compact(['task', 'id']));
    }

    // ##### LOCATIONS #####
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

    // ##### TYPOLOGIES #####
    // typologies index
    public function indexTypology() {
        $typologies = Typology::all();        
        return view('pages.typ-index', compact(['typologies']));
    }
    // typologies show
    public function showTypology($id) {
        $typology = Typology::findOrFail($id);        
        return view('pages.typ-show', compact(['typology']));
    }
    // typology create page
    public function typologyCreate() {
        $tasks = Task::all();
        return view('pages.create-typology', compact(['tasks']));
    }
    // store typology 
    public function typologyStore(Request $request) {
        $data = $request -> all();
        // dd($data);

        $typology = Typology::make($request -> all());
        $typology -> save();

        $tasks = Task::findOrFail($data['tasks']);
        $typology -> tasks() -> attach($tasks); 

        return redirect() -> route('index-typology');
    }

}
