@extends('layout')

@section('header')
  <a href="/">Back to menu</a>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="page_section_separator"></div>

            <h3 id="expand_collapse_button_1" class="expand_collapse_button">
                <span id="expand_collapse_span_1">►</span> Add a new term</h3>

            <div class="form_frame expand_collapse_area" id="expand_collapse_area_1">
                <form method="POST" action="/terms/create" enctype="multipart/form-data">
                    <div class="form-group" style="text-align: left">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Picture:</label>
                        <input type="file" name="picture" class="form-control" />
                    </div>
                    {{ csrf_field() }}
                    <div>
                        <input type="submit" name="submit" value="Add a Term" class="form-control submit_button" />
                    </div>
                </form>
            </div>

            <div style="height: 1em"></div>

            <h3>Terms ({{ $terms_count }})</h3>

            <ul class="list-group">
                @foreach ($terms as $term)
                    <li class="list-group-item thumb_list_item">
                        <div style="overflow: hidden;">
                            <div style="float: left">
                                {{ $term->id }} |
                                <span class="list_item_main">{{ $term->name }}</span> |
                                {{ $term->picture }} |
                                <a href="/terms/details/{{ $term->id }}" class="list_item_main">Edit</a> |
                                <a href="/terms/delete/{{ $term->id }}" class="delete_confirm">Delete</a>
                                <br/>
                                Vocabulary items: <span style="font-weight: bold; font-size: large;">{{ count($term->voc_items) }}</span>
                            </div>
                            <div class="thumb_outer_div">
                                <a href="/terms/details/{{ $term->id }}">
                                    <div class="thumb_inner_div" style="background-image: url('/images/terms/{{ $term->picture }}');">
                                        <!-- <img src="/images/terms/{{ $term->picture }}" height="60px" /> -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="page_section_separator"></div>
            <?php echo $terms->render(); ?>

        </div>
    </div>
@stop
