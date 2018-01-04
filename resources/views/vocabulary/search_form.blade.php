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
                        <input id="search_field" type="text" name="keyword" value="" class="form-control" />
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>

            <div class="page_section_separator"></div>

            <div id="search_results"></div>

        </div>
    </div>

@stop
