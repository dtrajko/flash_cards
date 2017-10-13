@extends('layout')

@section('content')

<h2>All Languages</h2>
<ul class="list-group">
@foreach ($languages as $language)
  <li class="list-group-item">{{ $language->id }} | <a href="/languages/{{ $language->id }}">{{ $language->name }}</a></li>
@endforeach
</ul>

@stop
