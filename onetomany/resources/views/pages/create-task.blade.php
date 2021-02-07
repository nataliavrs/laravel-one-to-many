@extends('layouts.main-layout')

@section('content')
    <main class="create-task-content">
        <h1>Create a new task</h1>
        
        <form action="{{route('store-task')}}" method="POST">

            @csrf
            @method('POST')

            <label for="title">Title:</label>
            <input name="title" type="text">

            <label for="">Priority:</label>
            <input name="priority" type="text">

            <label for="">Description:</label>
            <input name="description" type="text">

            <label for="emp_id">Employee:</label>
            <select name="emp_id">
                @foreach ($emps as $emp)
                <option value="{{ $emp -> id }}">{{$emp -> name}}</option>                
                @endforeach
            </select>

            <input type="submit" value="Create task">

        </form>
    </main>    
@endsection