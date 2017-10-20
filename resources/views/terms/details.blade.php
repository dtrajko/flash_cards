@extends('layout')

@section('header')
    <a href="/terms">Back to terms</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div style="overflow: hidden">
                <div style="float: left">
                    {{ $term->id }} |
                    <span class="list_item_main">{{ $term->name }}</span> |
                    {{ $term->picture }} |
                    <a href="/terms/delete/{{ $term->id }}">Delete</a>
                </div>
                <div style="float: right">
                    <img src="/images/terms/{{ $term->picture }}" width="80px" />
                </div>
            </div>

            <h3>Add a new vocabulary entry</h3>

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
                <input type="hidden" name="term_id" value="{{ $term->id }}">
                <div class="form-group">
                    <input type="submit" name="submit" value="Add a Vocabulary entry" class="form-control" />
                </div>

                {{ csrf_field() }}

            </form>

            <br />
            <h2>Vocabulary entries</h2>

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
