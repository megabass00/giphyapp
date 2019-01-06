@extends('front.templates.main')

@section('title', 'Giphy List')

@section('css')
    <link rel="stylesheet" href="css/frontend/search-results.css">
@endsection

@section('content')

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

    <best-tags></best-tags>
    <search-autocomplete></search-autocomplete>

    <div class="row results">
        <div class="container">
            <div class="row">
                @foreach ($results as $giphy)
                    <div class="col-lg-3">
                        <giphie-card :giphy="{{ $giphy }}"></giphie-card>
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
        loadTopViewed();
    });


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