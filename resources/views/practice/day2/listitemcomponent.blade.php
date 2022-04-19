@extends('practice.layout')

@section('main-content')
    <div id="container">
        <ol>
            <list-item
            v-for="item in cars"
            :title="title"
            v-bind:car="item"
            >
            </list-item>
        </ol>
        <p>Which is your favorite car?</p>
        <input type="text" v-model="favorite">
        <button v-on:click="favoriteCar()">Favorite</button>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/practice/day2/listitemcomponent.js') }}"></script>
@endsection