@extends('practice.layout')

@section('main-content')
    <div id="container">
    <h1 :class="{display:isDisplayed, 'text-danger':hasError}">Ihtisham ul haq</h1>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/practice/day3/inlinestyle.js') }}"></script>
@endsection