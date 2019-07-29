<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div id="app">
        
            <v-app>
            <app-home></app-home>
            </v-app>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
