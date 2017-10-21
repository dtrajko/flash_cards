@extends('layout')

@section('header')
    <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3>Add a new language</h3>

            <div class="form_frame">
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
                    <div class="form-group">
                        <input type="submit" name="submit" value="Add Language" class="form-control" />
                    </div>
                </form>
            </div>

            <br />
            <h2>Languages</h2>

            <ul class="list-group">
            @foreach ($languages as $language)
              <li class="list-group-item @if ($language->enabled == 1) language_enabled @else language_disabled @endif">
                  <div style="overflow: hidden;">
                      <div>
                          {{ $language->id }} |
                          <a href="/languages/{{ $language->id }}" class="list_item_main">{{ $language->name }}</a> |
                          <div id="language_switch_{{ $language->id }}" class="language_switch @if(!$language->enabled) language_switch_disabled @endif">{{ $language->enabled ? 'ON' : 'OFF'  }}</div> |
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
