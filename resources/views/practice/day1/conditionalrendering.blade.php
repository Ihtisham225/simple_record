@extends('practice.layout')

@section('main-content')
    <div id="conditional-rendering">
        <p v-if="seen">@{{ message }}</p>
        
        <h4>Using for loop below:</h4>
        <ol>
            <li v-for="list in lists">
                @{{ list.text }}
            </li>
        </ol>

    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/practice/day1/conditionalrendering.js') }}"></script>

@endsection