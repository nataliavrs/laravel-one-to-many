@extends('layouts.main-layout')

@section('content')

    <main class="index-content">

        <h2>Employees</h2>

        @foreach ($emps as $emp)
            <ul>
                <li>{{$emp -> name}} {{$emp -> lastname}}</li>
            </ul>
        @endforeach    

    </main>
    
@endsection