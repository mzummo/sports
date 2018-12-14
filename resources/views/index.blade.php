<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel Sports App</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>

    </head>
    <body>
        <div id="mute"></div>
        <div id='app' class="container">

            <button @click="addTeam()" class="btn btn-success " style="padding:5px">
                Add Team
            </button>
            <button @click="addPlayer()" class="btn btn-success " style="padding:5px">
                Add Player
            </button>

            <player-list v-bind:players="players"></player-list>
            <team-list v-bind:teams="teams"></team-list>

            <example-component></example-component>

            <ul id="example-1">
            <li v-for="item in items">
                @{{ item.message }}
            </li>
            </ul>

        </div>

        <script src="js/app.js"></script>
    </body>
</html>