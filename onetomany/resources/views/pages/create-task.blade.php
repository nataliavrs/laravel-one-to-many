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
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            {{-- <input name="description" type="text" id="input-eric"> --}}

            <label for="emp_id">Employee:</label>
            <select name="emp_id">
                @foreach ($emps as $emp)
                <option value="{{ $emp -> id }}">{{$emp -> name}}</option>                
                @endforeach
            </select>

            <input type="submit" value="Create task">

        </form>

         {{-- ERROR MESSAGE --}}        
         @if ($errors->any())
            <div class="alert">    
                @foreach ($errors->all() as $error)
                    <div>
                        <h3>Error</h3>
                        <span class="error-msg">{{$error}}</span>
                        <br>
                        <button id="button-alert"><i class="fas fa-times"></i></button> 
                    </div>  
                @endforeach                    
            </div>
        @endif    

    </main>    
@endsection