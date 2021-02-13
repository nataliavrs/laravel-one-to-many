<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use App\Location;
use App\Typology;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MainController extends Controller
{   
    // page - index
    public function index(){
        return view('pages.index');
    }

    // ##### EMPLOYEES #####
    // page - employee index
    public function indexEmplo() {
        $emps = Employee::all();
        return view('pages.employee-index', compact(['emps']));
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
        $data = $request -> all();
        
        Validator::make($data, [
            'title' => 'required|min:5',
            'priority' => 'required',
            'description' => 'required|min:10|max:200',
        ])->validate();
        
        $newTask = Task::make($request -> all());
        $emp = Employee::findOrFail($request -> get('emp_id'));
        $newTask -> employee() -> associate($emp);
        $newTask -> save();
        return redirect() -> route('index-task');
        // dd($newTask);
    }
    // page - update (edit) task 
    public function taskUpdatePage($id) {
        $emps = Employee::all(); // model prende i dati dal DB, dopo nel controller chiamo il model e dopo ci lavoro
        $task = Task::findOrFail($id);
        return view('pages.update-task', compact(['task', 'emps']));
    }

    // ##### UPDATE (EDIT) TASK USING VALIDATOR CUSTOM ERROR MESSAGES
    public function taskUpdate(Request $request, $id) {
        $data = $request -> all();

        Validator::make($data, 
        [
            'title' => 'required|min:5',
            'priority' => 'required|integer|between:1,5',
            'description' => 'required|min:10|max:1000',
        ], 
        [
            'title.min' => 'Minimo 5 caratteri per il titolo.',
            'priority.required' => 'Il campo priorità è richiesto.',
            'priority.between' => 'Il valore :input per la priorità non è fra :min - :max.',
            'description.min' => 'Minimo 10 caratteri per la descrizione.'
        ])
        ->validate();

        $task = Task::findOrFail($id);
        $task -> update($data);
        
        return redirect()        
        -> route('show-task', ['id' => $id]);
        
        // con il redirect aggiorna - giusto
        // parametri passati con array
        // return redirect() -> route('show-task', ['id' => $id, 'altra' => $altra]);

        // con il return di una view non aggiorna URL - sbagliato
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
    // store (create) typology 
    public function typologyStore(Request $request) {
        $data = $request -> all();
        // dd($data);

        Validator::make($data, [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ])->validate();
        
        $typology = Typology::make($request -> all());
        $typology -> save();
        
        if (array_key_exists('tasks', $data)) {
            $tasks = Task::findOrFail($data['tasks']);
        } else {
            $tasks = [];
        }
        $typology -> tasks() -> attach($tasks); 

        return redirect() -> route('index-typology');
    }
    // edit (update) typology page
    public function typologyUpdatePage($id) {

        $typology = Typology::findOrFail($id);
        $tasks = Task::all();

        return view('pages.update-typology', compact(['typology', 'tasks']));
    }
    // update typology
    public function typologyUpdate(Request $request, $id) {

        $data = $request -> all();
        // dd($data);
        
        Validator::make($data, [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ])->validate();
            
        $typology = Typology::findOrFail($id);
        $typology -> update($data);
        $typology -> save();

        if (array_key_exists('tasks', $data)) {
            $tasks = Task::findOrFail($data['tasks']);
        } else {
            $tasks = [];
        }

        $typology -> tasks() -> sync($tasks);

        // return redirect() -> route('show-typology', ['id' => $id]);
        return redirect() -> route('show-typology', $typology -> id);
    }

}
