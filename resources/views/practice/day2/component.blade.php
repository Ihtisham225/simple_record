@extends('practice.layout')

@section('main-content')


{{-- navbar --}}
  <div id="header">
    <div id="navbar">
      <ul>
        <nav-links
        v-bind:style="style"
        v-for="item in links"
        v-bind:nav="item"
        ></nav-links>
      </ul>
    </div>
  </div>


  {{-- main container --}}
  <div id="container">
    <table>
      <thead>
        <tr>
          <th>
            Brand Name
          </th>
        </tr>
      </thead>
      <tbody>
        <td>
          <brand-list
          v-for="laptop in brands"
          v-bind:brand="laptop" 
          ></brand-list>
        </td>
      </tbody>
    </table>
  </div>

@endsection

@section('scripts')
    <script src="js/practice/day2/component.js"></script>
@endsection