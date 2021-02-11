@extends('layouts.main-layout')

@section('content')

    <div class="loc-show-content">        
        <h1>Name: {{$typology -> name}}</h1>         
        <h1>Description: {{$typology -> description}}</h1>
        <br>

        <ul>
            <h2>Tasks with this typology:</h2>

            @foreach ($typology -> tasks as $task)             
            <li>Task: {{$task -> title}}</li>                                                                                            
            <li>Employee given this task: {{$task -> employee -> name}}</li>                                                                                            

            <hr>        
            @endforeach
            <h2><a href="{{route('update-typology-page', $typology -> id)}}">Edit typology</a></h2>

        </ul>

    </div>

@endsection