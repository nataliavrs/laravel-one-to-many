@extends('layouts.main-layout')

@section('content')

    <main class="index-content">

        <h2>Employees</h2>

        @foreach ($emps as $emp)
            <ul>
                <li>
                 <a href="{{route('emp-show', $emp -> id)}}">{{$emp -> name}} {{$emp -> lastname}}</a>   
                </li>                
            </ul>
        @endforeach    

    </main>
    
@endsection