@extends('practice.layout')

@section('main-content')
    <div id="two-way-binding">
        <p>@{{ message }}</p>
        
        <input v-model="message">
        <button v-on:click="reverseMessage">Reverse</button>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/practice/day1/twowaybinding.js') }}"></script>

@endsection