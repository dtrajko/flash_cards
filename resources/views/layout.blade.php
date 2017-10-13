<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash Cards</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    @yield('header')

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
</body>
</html>