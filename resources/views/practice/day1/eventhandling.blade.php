@extends('practice.layout')

@section('main-content')
    <div id="event-handling">
        <p>@{{ message }}</p>
        
        <button v-on:click="reverseMessage">Reverse</button>

        <p>@{{ counter }}</p>
        <button v-on:click="increment">Increment</button>
        <button v-on:click="decrement">Decrement</button>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/practice/day1/eventhandling.js') }}"></script>

@endsection