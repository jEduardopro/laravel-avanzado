<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Channels</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        {{--  <h2>Sala {{ auth()->user()->name }}</h2>  --}}
        <h2>Sala {{ $id }}</h2>
        <div id="app">
            <example :room="{{ $id }}"></example>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            window.Echo.private('notificacion.'+ {{ auth()->user()->id }}).listen('Notificacion', (e) => {
                console.log(e);
                alert(e.message);
                // this.listPublications.unshift(e.publication);
            });
        </script>
    </body>
</html>
