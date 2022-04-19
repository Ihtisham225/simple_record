@extends('practice.layout')

@section('main-content')
    <div id="main">
        <h1 v-bind:title="title">@{{ heading }}</h1>

        <!-- two way binding -->
        <input type="text" v-model="name">
        <p>@{{ name }}</p>

        <!-- Calling a function with Button click -->
        <p>@{{ counter }}</p>
        <button v-on:click="increment">increment</button>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/practice/day1/recallingday1.js')}}"></script>
@endsection