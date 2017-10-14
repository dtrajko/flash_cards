@extends('layout')

@section('header')
    Menu
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Flash Cards - Menu</h2>

            <ul class="list-group">
                <li class="list-group-item"><a href="/languages">Languages</a></li>
                <li class="list-group-item"><a href="/terms">Terms</a></li>
                <li class="list-group-item"><a href="/vocabulary">Vocabulary</a></li>
                <li class="list-group-item"><a href="/cards">Play Cards</a></li>
            </ul>

        </div>
    </div>

@stop
