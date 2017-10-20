@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3>Add a new term</h3>

            <form method="POST" action="/terms/create" enctype="multipart/form-data">
                <div class="form-group" style="text-align: left">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Picture:</label>
                    <input type="file" name="picture" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add a Term" class="form-control" />
                </div>

                {{ csrf_field() }}

            </form>

            <br />
            <h2>Terms</h2>

            <ul class="list-group">
                @foreach ($terms as $term)
                    <li class="list-group-item">
                        <div style="overflow: hidden;">
                            <div style="float: left">
                                {{ $term->id }} |
                                <span class="list_item_main">{{ $term->name }}</span> |
                                {{ $term->picture }} |
                                <a href="/terms/details/{{ $term->id }}">Edit</a> |
                                <a href="/terms/delete/{{ $term->id }}">Delete</a>
                            </div>
                            <div style="float: right">
                                <img src="/images/terms/{{ $term->picture }}" width="80px" />
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
@stop
