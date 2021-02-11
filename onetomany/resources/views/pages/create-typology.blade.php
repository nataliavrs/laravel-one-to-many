@extends('layouts.main-layout')

@section('content')

    <div class="create-typo-content">
        
        <form action="{{route('store-typology')}}" method="POST">
            @csrf
            @method('POST')
            
            <label for="name">Name:</label>
            <input name="name" type="text">
            
            <label for="description">Description:</label>
            <input name="description" type="text">
            <br>

            <label for="tasks[]">Select a task:</label>
            @foreach ($tasks as $task)
            <br>
            {{-- ASSOCIATE VALUE TO CHECKBOX --}}
            <input name="tasks[]" type="checkbox" value="{{$task -> id}}"> {{$task -> title}}
            @endforeach
            <br>
            <input type="submit" value="Create typology">
                    
        </form>

    </div>
@endsection