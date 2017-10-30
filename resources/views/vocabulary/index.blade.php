@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="page_section_separator"></div>

            <h3 id="expand_collapse_button_1" class="expand_collapse_button">
                <span id="expand_collapse_span_1">►</span> Add a new entry</h3>

            <div class="form_frame expand_collapse_area" id="expand_collapse_area_1">
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
                    {{ csrf_field() }}
                    <div>
                        <input type="submit" name="submit" value="Add a Vocabulary entry" class="form-control submit_button" />
                    </div>
                </form>
            </div>

            <div style="height: 0.5em"></div>

            <h3>Vocabulary ({{ $voc_count }})</h3>

            <ul class="list-group">
                @foreach ($vocabulary as $voc_item)
                    <li class="list-group-item">
                        {{ $voc_item->id }} |
                        <span class="vocabulary_translation">{{ $voc_item->translation }}</span> |
                        {{ $voc_item->term->name }} |
                        {{ $voc_item->language->name }} |
                        <a href="/vocabulary/display/{{ $voc_item->id }}">Edit</a> |
                        <a href="/vocabulary/delete/{{ $voc_item->id }}">Delete</a>
                    </li>
                @endforeach
            </ul>

            <div class="page_section_separator"></div>
            <?php echo $vocabulary->render(); ?>

        </div>
    </div>

@stop
