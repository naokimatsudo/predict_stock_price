<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head> 
<body>
<div id="app">
  {{-- @{{ message }} --}}
  <header-component></header-component>
</div>
<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}" defer></script>
{{-- <script>
  var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue!'
    }
  }) --}}
</body>
</html>