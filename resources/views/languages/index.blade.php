@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3 id="expand_collapse_button_1" class="expand_collapse_button">
                <span id="expand_collapse_span_1">►</span> Add a new language</h3>

            <div class="form_frame expand_collapse_area" id="expand_collapse_area_1">
                <form method="POST" action="/languages/create" enctype="multipart/form-data">
                    <div class="form-group">
                        Name: <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        Enabled: <input type="checkbox" name="enabled" />
                    </div>
                    <div class="form-group">
                        <label>Flag:</label>
                        <input type="file" name="flag" class="form-control" />
                    </div>
                    {{ csrf_field() }}
                    <div>
                        <input type="submit" name="submit" value="Add a Language" class="form-control submit_button" />
                    </div>
                </form>
            </div>

            <div style="height: 1em"></div>

            <h3>Languages</h3>

            <ul class="list-group">
            @foreach ($languages as $language)
              <li class="list-group-item @if ($language->enabled == 1) language_enabled @else language_disabled @endif">
                  <div style="overflow: hidden;">
                      <div style="display: inline">
                          {{ $language->id }} |
                          <a href="/languages/{{ $language->id }}" class="list_item_main">{{ $language->name }}</a> |
                          <div id="language_switch_{{ $language->id }}" class="language_switch @if(!$language->enabled) language_switch_disabled @endif">
                              {{ $language->enabled ? 'ON' : 'OFF'  }}
                          </div> |
                          <a href="/languages/delete/{{ $language->id }}" class="delete_confirm">Delete</a>
                      </div>
                      <div style="float: right">
                          <img src="/images/flags/{{ $language->flag }}" width="100px" />
                      </div>
                  </div>
              </li>
            @endforeach
            </ul>

        </div>
    </div>

@stop
