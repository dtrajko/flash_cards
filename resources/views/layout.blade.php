<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Flash Cards</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="padding-top:16px">
                    <ul class="list-group">
                        <li class="list-group-item">
                            @yield('header')
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div class="container">
            @yield('footer')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="{{asset('js/flash_cards.js')}}"></script>
    </body>
</html>