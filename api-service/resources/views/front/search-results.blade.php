@extends('front.templates.main')

@section('title', 'Giphy List')

@section('css')
    <link rel="stylesheet" href="css/frontend/search-results.css">
@endsection

@section('content')
    <div class="row">
        <div class="btn-login">
            <a href="{{ url('/login') }}">
                Login
            </a>
        </div>
    </div>

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
    
    <div class="row top-viewed">
        <div class="title">
            <h1 class="text-border">
                Top Viewed
            </h1>
            <small class="text-border">
                Here you can see the most viewed giphies. If you click into some giphy it copies url to the clipboard.
            </small>
        </div>
        <div class="container-fluid">
            <div class="top-viewed-container">
            </div>
        </div>
    </div>

    <div class="row results">
        <div class="container">
            <div class="row">
                @foreach ($results as $giphy)
                    <div class="col-lg-3">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="{{ $giphy->url }}" alt="{{ $giphy->title }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $giphy->title }}
                                </h5>
                                <p class="card-text">
                                    <small>
                                        {{ $giphy->description }}
                                    </small>
                                </p>
                                <input name="input-rating" class="rating-loading rating-giphy" value="{{ $giphy->rating }}" data-id="{{ $giphy->id }}">
                                <a class="btn-rating">
                                    Send rating                                
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('js')
<script type="text/javascript">
    $(document).ready(function() 
    {
        initRatingFields();

        initAutocompleteField();
        loadTopViewed();
    });


    function initRatingFields() {
        $('.rating-giphy').rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'xs',
            showClear: true,
            showCaption: true,
            clearButton: '<i class="fas fa-minus-circle"></i>',
            emptyStar: '<i class="far fa-star"></i>',
            filledStar: '<i class="fas fa-star"></i>'
        });

        $('.btn-rating').click(function() {
            var $card = $(this).parent();
            var $link = $(this);
            var $inputRating = $card.find('input');
            var rating = $card.find('input').val();
            var giphyId = $card.find('input').data('id');
            $link.text('Sending...');

            $.ajax({
                url: '/ajax/giphies/rating',
                method:'POST',
                data: {
                    id: giphyId,
                    rating: rating
                },
                success: function(data) { 
                    if(data.success) { 
                        $link.remove();
                        $card.append('<div>Thanks for rating!</div>');
                        $inputRating.rating('refresh', {disabled:true, showClear:false, showCaption:true});
                    }   
                }, 
                fail: function() {
                    console.log('ERROR');
                } 
            });
        });
    }

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

    function loadTopViewed() {
        var $container = $('.top-viewed-container');

        var options = {
            'selector': $container,
            'url': '/ajax/giphies/topViewed',
            'data': {}
        };
        functions.ajaxRequest(options, function(data){
            if (data.success) { 
                var items = '';
                data.giphies.forEach(function(obj, index) {
                    items += `
                        <div class="giphy-thumb btn-clipboard" data-clipboard-text="`+obj.url+`" data-title="`+obj.title+`" data-id="`+obj.id+`">
                            <img class="img-fluid mx-auto d-block" src="`+obj.url+`" alt="`+obj.title+`">
                        </div>
                    `;
                });
                $container.hide();
                $container.append(items);
                $('.top-viewed-container').slick({
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true,
                    autoplay: true,
                    autoplaySpeed: 1000,
                }).fadeIn('slow');
            }
        }, function(percent) {
            console.log(percent+'%');

        }, function(error) {
            console.log(error);

        });
    }
</script>
@endsection