@extends('layouts.main-layout')

@section('content')

<div class="loc-index-content">
    <h1>Locations</h1>
    
    <ul>
        @foreach ($locations as $location)
        <li>
            <a href="{{route('show-location', $location -> id)}}">{{$location -> name}}</a>                
        </li>            
        @endforeach
    </ul>
</div>
    
@endsection