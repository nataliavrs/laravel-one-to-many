@extends('layouts.main-layout')

@section('content')
    
    <div class="update-typo-content">

        <form action="{{route('update-typology', $typology -> id)}}" method="POST">
            @csrf
            @method('POST')
            
            <label for="name">Name:</label>
            <input name="name" type="text" value="{{$typology -> name}}">
            
            <label for="description">Description</label>
            {{-- <textarea type="text" > --}}
            <textarea name="description" id="" cols="30" rows="5">{{$typology -> description}}</textarea>
            
            <label for="tasks[]">Select tasks</label>            
            @foreach ($tasks as $task)
            <br>
                <input
                    name="tasks[]"
                    type="checkbox"
                    value="{{$task -> id}}"
                @if ($typology -> tasks -> contains($task -> id))
                    checked
                @endif
                > {{$task -> title}}
            @endforeach

            <input type="submit" value="Edit typology">
            
        </form>
    </div>

@endsection