@extends('front.templates.main')

@section('title', 'Giphy List')

@section('css')
    <link rel="stylesheet" href="css/frontend/search-results.css">
@endsection

@section('content')

    <search-autocomplete></search-autocomplete>
    
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