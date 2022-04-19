@extends('practice.layout')

@section('main-content')
    <div id="attribute-bind">
        <span v-bind:title="message">
            Hover mouse over me to show a tip
        </span>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/practice/day1/attributebind.js') }}"></script>

@endsection