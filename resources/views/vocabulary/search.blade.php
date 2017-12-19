@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="page_section_separator"></div>

            <div>
                <form id="search_form" method="GET" action="/vocabulary/search/">
                    <div class="form-group" style="text-align: left">
                        <label>Search:</label>
                        <input id="search_field" type="text" name="keyword" value="{{ $keyword }}" class="form-control" />
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>

            <div class="page_section_separator"></div>

            <ul class="list-group">
                @foreach ($results as $voc_item)
                    <li class="list-group-item">
                        {{ $voc_item->id }} |
                        <span class="vocabulary_translation"><a href="/vocabulary/display/{{ $voc_item->id }}">{{ $voc_item->translation }}</a></span> |
                        <a href="/terms/details/{{ $voc_item->term->id }}">{{ $voc_item->term->name }}</a> |
                        {{ $voc_item->language->name }}
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

@stop
