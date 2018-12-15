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
        <div id="application" class="container">
            <app></app>

            <modal v-if="showModal" @close="showModal = false"></modal>

        </div>
        <script src="js/app.js"></script>
    </body>
</html>