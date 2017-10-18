@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align: center;">
            <div style="outline: solid thin #8aa6c1; display: inline-block; margin: 0 auto; padding: 10px;">
                <img src="/images/terms/{{ $term->picture }}" height="200px" />
            </div>
            <div style="display: block; margin: 0 auto; margin-top: 10px">
                <img src="/images/flags/{{ $language->flag }}" width="100px" />
                <span class="list_item_main">{{ $language->name }}</span>
            </div>
            @foreach($voc_options as $voc_option)
                <div class="card_option" id="card_option_{{ $term->id }}_{{ $language->id }}_{{ $voc_option->id }}">
                    <span class="list_item_main">{{ $voc_option->translation }}</span>
                    <!-- TermID: {{ $term->id }} LanguageID: {{ $language->id }} VocabularyID: {{ $voc_option->id }} -->
                </div>
            @endforeach
            {{ csrf_field() }}
        </div>
    </div>

    <!-- Begin Modal -->
    <div id="modal_popup_background" class="modal_popup_background">
        <div id="modal_popup" class="modal_popup">
            <div id="modal_popup_message" class="modal_popup_message">
            </div>
            <div id="modal_popup_button" class="modal_popup_button">&nbsp;&nbsp;NEXT&nbsp;►</div>
        </div>
    </div>
    <!-- End Modal -->

@stop
