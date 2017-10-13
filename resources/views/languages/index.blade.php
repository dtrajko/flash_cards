<h2>All Languages</h2>
<ul>
@foreach ($languages as $language)
    <li>{{ $language->id }} | {{ $language->name }}</li>
@endforeach
</ul>
