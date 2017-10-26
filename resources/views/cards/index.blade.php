@extends('layout')

@section('header')
    <div style="overflow: hidden">
        <div style="float: left; line-height: 1.6em; padding-top: 0.2em">
            <a href="/">Back to menu</a>
        </div>
        <div style="float: right; line-height: 1.6em; padding-top: 0.2em">
            <span class="score_bar">Score: {{ $settings['score']->value }} | Best score: {{ $settings['score_total']->value }}</span>
        </div>
    </div>
@stop

@section('content')

    <div class="col-md-6 col-md-offset-3 flash_card_frame">
        <div class="flash_card">
            <div class="row">
                <div style="text-align: center;">
                    <div class="image_frame">
                        <img src="/images/terms/{{ $term->picture }}" height="150px" />
                    </div>
                    <div class="language_bar">
                        <img src="/images/flags/{{ $language->flag }}" width="60px" />
                        <span class="list_item_main" style="margin-left: 0.3em">{{ $language->name }}</span>
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
