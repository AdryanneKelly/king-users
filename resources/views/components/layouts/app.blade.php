<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'King Users' }}</title>
        @vite('resources/css/app.css')
        <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTXZ-kQcvxzmLJ_JPO7lW_ExtGxWULhw5l8uMdIEYS2q9GQw5g_hC9HdbVbxgKCJKcjMA&usqp=CAU" type="image/x-icon">
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
