@extends('layout')

@section('header')
    <a href="#" id="history_back"><< Back</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="page_section_separator"></div>

            <h3>Update the Vocabulary entry</h3>

            <div class="form_frame">
                <form method="POST" action="/vocabulary/update/{{ $vocabulary->id }}">
                    <div class="form-group">
                        Translation: <input type="text" name="translation" value="{{ $vocabulary->translation }}" class="form-control" />
                    </div>
                    <div class="form-group" style="text-align: left">
                        Language:
                        <select class="form-control" name="language_id">
                            @foreach($languages as $language)
                            <option value="{{ $language->id }}" @if ($language->id == $vocabulary->language_id) selected="selected" @endif>
                                {{ $language->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="text-align: left">
                        Term:
                        <select class="form-control" name="term_id">
                            @foreach($terms as $term)
                            <option value="{{ $term->id }}" @if ($term->id == $vocabulary->term_id) selected="selected" @endif>
                                {{ $term->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $vocabulary->id }}">
                    <div>
                        <input type="submit" name="submit" value="Update the Vocabulary entry" class="form-control submit_button" />
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop
