<ul class="list-group">
    @foreach ($results as $voc_item)
        <li class="list-group-item">
            {{ $voc_item->id }} |
            <span class="vocabulary_translation"><a href="/vocabulary/display/{{ $voc_item->id }}">{{ $voc_item->translation }}</a></span> |
            <a href="/terms/details/{{ $voc_item->term->id }}">{{ $voc_item->term->name }}</a> |
            {{ $voc_item->language->name }}
        </li>
    @endforeach
</ul>