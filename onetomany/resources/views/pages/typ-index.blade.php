@extends('layouts.main-layout')

@section('content')

<div class="typ-index-content">
    <h1>Typologies</h1>
    
    <ul>
        @foreach ($typologies as $typology)
        <li>
            <a href="{{route('show-typology', $typology -> id)}}">{{$typology -> name}}</a>                
        </li>            
        @endforeach
    </ul>
</div>

@endsection