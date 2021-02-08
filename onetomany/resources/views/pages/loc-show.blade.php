@extends('layouts.main-layout')

@section('content')

    <div class="loc-show-content">        
        <h1>{{$location -> name}} details</h1>
        
        
        <ul>
            <h3>Employees with this location:</h3>
            
            @foreach ($location -> employees as $employee)
            
            <li>{{$employee -> name}} {{$employee -> lastname}}</li>
            
            @foreach ($employee -> tasks as $task)
            
            <li>Task associated: {{$task -> title}}</li>
            
            @endforeach
            
            <hr>        
            @endforeach
        </ul>
    </div>

@endsection