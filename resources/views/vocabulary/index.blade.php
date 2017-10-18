@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3>Add a new entry</h3>

            <form method="POST" action="/vocabulary/create">
                <div class="form-group">
                    Translation: <input type="text" name="translation" class="form-control" />
                </div>
                <div class="form-group" style="text-align: left">
                    Language: <select class="form-control" name="language_id">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="text-align: left">
                    Term: <select class="form-control" name="term_id">
                        @foreach($terms as $term)
                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add a Term" class="form-control" />
                </div>

                {{ csrf_field() }}

            </form>

            <br />
            <h2>Vocabulary</h2>

            <ul class="list-group">
                @foreach ($vocabulary as $voc_item)
                    <li class="list-group-item">
                        {{ $voc_item->id }} |
                        <span class="vocabulary_translation">{{ $voc_item->translation }}</span> |
                        {{ $voc_item->term->name }} |
                        {{ $voc_item->language->name }} |
                        <a href="/vocabulary/delete/{{ $voc_item->id }}">Delete</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

@stop
