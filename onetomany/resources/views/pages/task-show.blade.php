@extends('layouts.main-layout')

@section('content')

    <div class="task-show-content">       
        <h1>Title: {{$task -> title}}</h1>         
        <h1>Description: {{$task -> description}}</h1>
        <h1>Priority: {{$task -> priority}}</h1>
        <br>

        <ul>
            <h2>Employee given this task:</h2>
            <li>Full name: {{$task -> employee -> name}} {{$task -> employee -> lastname}}</li>
            <li>Date of Birth: {{$task -> employee -> dateOfBirth}}</li>
        </ul>

        <h2><a href="{{route('update-task', $task -> id)}}">Edit Task <i class="far fa-edit"></i></a></h2>

    </div>

@endsection