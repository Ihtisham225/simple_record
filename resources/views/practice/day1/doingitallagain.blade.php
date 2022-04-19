@extends('practice.layout')

@section('main-content')
    <div id="main">
        {{-- attribute bind --}}
        <h1 v-bind:title="title">@{{ heading }}</h1>

        {{-- two way binding --}}
        <p>@{{ message }}</p>

        <p>@{{ name }}</p>

        <input v-model="name">

        {{-- Event handling --}}
        <button v-on:click="reverseName">Reverse Name</button>

        <p>@{{ timer }}</p>

        <p> @{{ counter }} </p>
        <button v-on:click="increment">+</button>
        <button v-on:click="decrement">-</button>
        <button v-on:click="reset">Reset</button>

        {{-- Conditional Rendring --}}

        <p v-if="seen">The condition is true so you can see me</p>

        @php
            $counter = 0;
        @endphp
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>
                        @{{ user.id }}
                    </td>
                    <td>
                        @{{ user.name }}
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
<hr>
    <div id="calculator" style="display:flex">
        
        <div>
            <h4>Addition</h4>
            <label for="first_number">First Number</label><br>
            <input v-model="a1" type="number"> <br>
            <label for="second_number">Second Number</label><br>
            <input v-model="a2" type="number">
            <p>@{{ a1 + a2 }}</p>
        </div>

        <div style="margin-left: 20px">
            
            <h4>Multiplication</h4>
            <label for="first_number">First Number</label><br>
            <input v-model="m1" type="number"> <br>
            <label for="second_number">Second Number</label><br>
            <input v-model="m2" type="number">
            <p>@{{ m1 * m2 }}</p>
        </div>

        <div style="margin-left: 20px">
            
            <h4>Subtraction</h4>
            <label for="first_number">First Number</label><br>
            <input v-model="s1" type="number"> <br>
            <label for="second_number">Second Number</label><br>
            <input v-model="s2" type="number">
            <p>@{{ s1 - s2 }}</p>
        </div>

        <div style="margin-left: 20px">
            
            <h4>Division</h4>
            <label for="first_number">First Number</label><br>
            <input v-model="d1" type="number"> <br>
            <label for="second_number">Second Number</label><br>
            <input v-model="d2" type="number">
            <p>@{{ d1 / d2 }}</p>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Page specefic script -->
    <script src="{{ asset('js/practice/day1/doingitallagain.js') }}"></script>
@endsection