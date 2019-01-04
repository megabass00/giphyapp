@extends('front.templates.main')

@section('title', 'Giphy List')

@section('content')
    <div class="row searcher">
        <div class="search-wrapper">
            <div class="container container--add">
                {{ Form::open(['url'=>'search-results', 'id'=>'search-form', 'method'=>'GET', 'class'=>'search']) }}
                    {{ Form::text('q', '', ['id'=>'q', 'placeholder'=>'Search your giphy...', 'class'=>'seach-field']) }}
                    {{ Form::submit('Search', ['class'=>'btn btn-primary btn-search']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    
    <list-of-giphies></list-of-giphies>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() 
    {
        initAutocompleteField();
    });


    function initAutocompleteField() {
        $('#q').autocomplete({
            source: '{{ url('ajax/giphies/autocomplete') }}',
            minLenght: 3,
            select: function(event, ui) {
                $('#q').val(ui.item.value);
            }
        });

        $('#q').data('ui-autocomplete')._renderItem = function(ul, item) {
            var $li = $('<li style="width:800px; margin-left:10px; margin-bottom:5px;">');
            var $img = $('<img style="width:8%">');
            $img.attr({
                src: item.url,
                alt: item.value
            });
            $li.attr('data-value', item.value);
            $li.append('');
            $li.append($img).append(''+item.value);
            return $li.appendTo(ul);
        };
    }
</script>
@endsection