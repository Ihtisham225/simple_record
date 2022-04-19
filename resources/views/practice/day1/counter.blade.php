@extends('practice.layout')

@section('main-content')
    <div id="counter">
        @{{ counter }}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/practice/day1/counter.js') }}"></script>

@endsection