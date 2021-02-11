@extends('layouts.main-layout')

@section('content')

    <div class="update-task-content">
        <h3>{{$task -> id}}</h3>

        <form action="{{ route('update-task', $task -> id) }}" method="POST">
            @csrf
            @method('POST')
            
            <label for="title">Title</label>
            <input name="title" type="text" value="{{ $task -> title }}">
            <br>
            <label for="priority">Priority</label>
            <input name="priority" type="text" value="{{ $task -> priority }}">
            <br>
            <label for="description">Description</label>
            <input name="description" type="text" value="{{ $task -> description }}">
            <br>
             <label for="emp_id">Employee</label>
            <select name="emp_id">
                @foreach ($emps as $emp)
                    <option value="{{ $emp -> id }}" 
                        @if ($task -> employee -> id == $emp -> id)
                        selected
                        @endif
                    >{{ $emp -> name }}</option>
                @endforeach
            </select> 
            <br>
            <input type="submit" value="Edit task">
        </form> 

    </div>
    
@endsection