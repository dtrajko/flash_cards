@extends('layout')

@section('header')
    <a href="/terms">Back to terms</a>
@stop

@section('content')

    <div class="page_section_separator"></div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div style="overflow: hidden">
                <div style="float: left">
                    {{ $term->id }} |
                    <span class="list_item_main">{{ $term->name }}</span> |
                    {{ $term->picture }} |
                    <a href="/terms/delete/{{ $term->id }}" class="delete_confirm">Delete</a>
                </div>
                <div style="float: right" class="thumb_outer_div">
                    <img src="/images/terms/{{ $term->picture }}" height="100px" />
                </div>
            </div>

            <h3 id="expand_collapse_button_1" class="expand_collapse_button">
                <span id="expand_collapse_span_1">►</span> Edit the term</h3>

            <div class="form_frame expand_collapse_area" id="expand_collapse_area_1">
            <form method="POST" action="/terms/update/{{ $term->id }}" enctype="multipart/form-data">
                <div class="form-group" style="text-align: left">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ $term->name }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Picture:</label>
                    <input type="file" name="picture" class="form-control" />
                </div>
                <input type="hidden" name="id" value="{{ $term->id }}">
                {{ csrf_field() }}
                <div>
                    <input type="submit" name="submit" value="Edit the Term" class="form-control submit_button" />
                </div>
            </form>
            </div>

            <div style="height: 1em"></div>

            <h3 id="expand_collapse_button_2" class="expand_collapse_button">
                <span id="expand_collapse_span_2">►</span> Add a new vocabulary entry</h3>

            <div class="form_frame expand_collapse_area" id="expand_collapse_area_2">
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
                        {{ csrf_field() }}
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Add a Vocabulary entry" class="form-control submit_button" />
                    </div>
                </form>
            </div>

            <div style="height: 1em"></div>

            <h3>Vocabulary entries</h3>

            <ul class="list-group">
                @foreach ($vocabulary as $voc_item)
                    <li class="list-group-item">
                        {{ $voc_item->id }} |
                        <span class="vocabulary_translation">{{ $voc_item->translation }}</span> |
                        {{ $voc_item->term->name }} |
                        {{ $voc_item->language->name }} |
                        <a href="/vocabulary/display/{{ $voc_item->id }}" class="list_item_main">Edit</a> |
                        <a href="/vocabulary/delete/{{ $voc_item->id }}" class="delete_confirm_voc">Delete</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

@stop
