<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>
        GiphyAPP · Consejo Jedi
    </title>
    
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.0.0/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-5.5.0/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/loading.io/loading-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/vue-slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/vue-slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/star-rating/css/star-rating.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/star-rating/themes/krajee-fa/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/star-rating/themes/krajee-svg/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/star-rating/themes/krajee-uni/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<style>
    html,body{
        background-image: url('/images/consejo-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
        color: white;
    }

    .btn-login{
        float: left;
        margin: 10px 10px;
        border-radius: 3px;
        width: 10%;
        height: 25px;
        color: white;
        background-color: #51ce00;
        text-align: center;
    }
    .btn-login a {
        color: white;
    }


    .consejo-description{
        margin: 15px 0;
        height: 20vh;
        text-align: center;
        /* text-shadow: 0px -4px 4px rgba(0, 0, 0, 0.7); */
    }

    .top-viewed {
        text-align: center;
    }
    .top-viewed h1 {
        margin-bottom: 0.1vh;
    }
    .top-viewed-container {
        height: 20vh;
        /* border: 3px white solid; */
        margin-left: 2vw;
        margin-right: 2vw;
        margin-top: 3.5vh;
        margin-bottom: 2.5vh;
    }
    .slick-slide img {
        max-height: 19vh;
        padding: 0 0.2vw;
        border-radius: 7px;
        cursor: pointer;
    }


    .searcher {
        margin: 2vw 0;
    }
    .search-wrapper {
        text-align: center;
        width: 100%;
    }
    #q {
        border: 1px solid transparent;
        width: 80%;
        height: 9vh;
        min-height: 30px;
        font-size: 5vh;
        text-indent: 1vw;
        border-radius: 5px;
    }
    .btn-search {
        background-color: #51ce00;
        border-color: #51ce00;
        height: 9vh;
        min-height: 30px;
    }
    .btn-search:hover {
        color: #51ce00;
        background-color: #fff;
        border-color: #fff;
    }

    .title {
        width: 100%;
        text-align: center;
    }


    .card {
        margin: 2vh 0;
    }
    .card-body {
        background-color: black;
    }
</style>


<div class="container-fluid">
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
</div>


<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/fontawesome-5.5.0/js/all.js') }}"></script>
<script src="{{ asset('plugins/loading.io/loading-bar.js') }}"></script>
<script src="{{ asset('plugins/vue-slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/star-rating/js/star-rating.min.js') }}"></script>
<script src="{{ asset('plugins/star-rating/themes/krajee-fa/theme.js') }}"></script>
<script src="{{ asset('plugins/star-rating/themes/krajee-svg/theme.js') }}"></script>
<script src="{{ asset('plugins/star-rating/themes/krajee-uni/theme.js') }}"></script>
<script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>

<script src="/js/init-clipboard.js"></script>
<script src="/js/functions.js"></script>
<script>
    $.ajaxSetup({ // add csrf-token to all ajax headers
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

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
        ajaxRequest(options, function(data){
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

</body>
</html>