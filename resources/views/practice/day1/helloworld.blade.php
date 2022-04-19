@extends('practice.layout')

@section('main-content')
    <div id="hello-world">
        <h1>@{{ message }}</h1>
    </div>
@endsection
    
@section('scripts')
    <!-- Page specefic script -->
    <script src="{{ asset('js/practice/day1/helloworld.js') }}"></script>
@endsection    

