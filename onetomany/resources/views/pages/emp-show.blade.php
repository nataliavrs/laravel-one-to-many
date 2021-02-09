@extends('layouts.main-layout')

@section('content')
    <main class="emp-content">
        <h1>Employee n° {{$emp -> id}}</h1>    
        <ul>
            <li>Full name: {{$emp -> name}} {{$emp -> lastname}}</li>
            <li>Date of birth: {{$emp -> dateOfBirth}}</li>
        </ul>

        <h3>Tasks</h3>
        <ul>
            @foreach ($emp -> tasks as $task)            
                        <li>Title: {{ $task -> title }}</li>
                        <li>Priority: {{ $task -> priority }}</li>
                        <li>Description: {{ $task -> description }}</li>                       
                        <li><a href="{{route('update-task-page', $task -> id)}}">EDIT</a></li>                                                 
                        {{-- (I belong to {{ $task -> employee -> name }}) --}}
            @endforeach
        </ul>

        <h3>Locations</h3>
        <ul>
            @foreach ($emp -> locations as $location)            
                        <li>Name: {{ $location -> name }}</li>
                        <li>Coordinates: {{ $location -> coords }}</li>                                                
            @endforeach
        </ul>

    </main>
    @endsection