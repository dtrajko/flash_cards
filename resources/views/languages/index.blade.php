@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>All Languages</h2>

            <ul class="list-group">
            @foreach ($languages as $language)
              <li class="list-group-item">{{ $language->id }} |
                  <a href="/languages/{{ $language->id }}">{{ $language->name }}</a> |
                  {{ $language->enabled  }} |
                  <a href="/languages/delete/{{ $language->id }}">Delete</a>
              </li>
            @endforeach
            </ul>

            <h3>Add a new language</h3>

            <form method="POST" action="/languages/create">
                <div class="form-group">
                    Name: <input type="text" name="name" class="form-control" />
                </div>
                <div class="form-group" style="text-align: left">
                    Enabled: <input type="checkbox" name="enabled" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Language" class="form-control" />
                </div>

                {{ csrf_field() }}

            </form>

        </div>
    </div>

@stop
