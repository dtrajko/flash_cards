@extends('layout')

@section('header')
    Menu
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 bootstrap-col-override">

            <h2>Flash Cards - Menu</h2>

            <ul class="list-group">
                <li class="list-group-item menu_item">
                    <a href="/languages">
                        <div class="menu_item_div">Languages</div>
                    </a>
                </li>
                <li class="list-group-item menu_item">
                    <a href="/terms">
                        <div class="menu_item_div">Terms</div>
                    </a>
                </li>
                <li class="list-group-item menu_item">
                    <a href="/vocabulary">
                        <div class="menu_item_div">Vocabulary</div>
                    </a>
                </li>
                <li class="list-group-item menu_item">
                    <a href="/cards">
                        <div class="menu_item_div">Play Cards</div>
                    </a>
                </li>
            </ul>

        </div>
    </div>

@stop
