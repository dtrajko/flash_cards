@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>All Terms</h2>

            <ul class="list-group">
                @foreach ($terms as $term)
                    <li class="list-group-item">
                        {{ $term->id }} |
                        <span class="list_item_main">{{ $term->name }}</span> |
                        {{ $term->picture }} |
                        <a href="/terms/delete/{{ $term->id }}">Delete</a>
                    </li>
                @endforeach
            </ul>

            <h3>Add a new term</h3>

            <form method="POST" action="/terms/create">
                <div class="form-group">
                    Picture: <input type="text" name="picture" class="form-control" />
                </div>
                <div class="form-group" style="text-align: left">
                    Name: <input type="text" name="name" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add a Term" class="form-control" />
                </div>

                {{ csrf_field() }}

            </form>

        </div>
    </div>

@stop
