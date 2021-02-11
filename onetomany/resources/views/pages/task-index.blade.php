@extends('layouts.main-layout')

@section('content')
    
    <main class="task-index-content">

        <h1>Task</h1>

        @foreach ($tasks as $task)
            <ul>
                <li>
                <a href="{{route('show-task', $task -> id)}}">{{$task -> title}}</a>   
                </li>                
            </ul>
        @endforeach    
        <br>
        <h2>
            <a href="{{route('create-task')}}">Create new task</a>
        </h2> 

    </main>

@endsection