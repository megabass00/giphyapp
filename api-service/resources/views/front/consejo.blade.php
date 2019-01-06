@extends('front.templates.main')

@section('title', 'Consejo')

@section('css')
    <link rel="stylesheet" href="css/frontend/consejo.css">
@endsection


@section('content')

    {{-- <div class="row consejo-description text-border">
        Bienvenido al portal del consejo, el mejor desde luego de lejos. Aquí veras buenas almejas mientras el personal te aconseja. El mundo no es lo que era, a todo el mundo le falta más de una primavera. Mira a tu alrededor, todo destrucción, apestoso hedor. Vaya desesperación. La fauna que aquí aúna nos trae un rinoceronte lanudo, un cornudo que le lame el culo, y un barbudo de cuya inteligencia no dudo. Tienes un tio protestón, un tobillo como pilares del pateón y un equilibrista jefe de pista con un gran orejón. También hay cerditas, un yeti que huele braguitas y un moai. Esto es lo que hay.
    </div> --}}
    
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

    <best-tags></best-tags>
    
    <div class="row masonry-list">
        <div class="title">
            <h1 class="text-border">
                Wellcome to giphy world!!!
            </h1>
        </div>
        <div id="masonry-list-container" class="masonry-list-container">
            <div class="masonry-sizer"></div>
        </div>
    </div>
@endsection


@section('js')
<script type="text/javascript">
    $(document).ready(function() 
    {
        loadTopViewed();

        var transitionProp;
        var transitionEndEvent;
        loadMasonry(transitionProp, transitionEndEvent);
        
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

    function loadMasonry(transitionProp, transitionEndEvent) {
        var $container = $('#masonry-list-container');
        var columnWidth = $container.width() / 10;
        var $container = $container.masonry({
            itemSelector: '.masonry-item',
            columnWidth: 60
        });


        var options = {
            'selector': $container,
            'url': '/ajax/giphies/masonryList',
            'data': {}
        };
        functions.ajaxRequest(options, function(data){
            if (data.success) { 
                var $items = functions.getMasonryItems(data.giphies);
                $container.masonryImagesReveal( $items );
                functions.configureMasonryContainer('.masonry-list-container', transitionProp, transitionEndEvent);
            }
        }, function(percent) {
            console.log(percent+'%');

        }, function(error) {
            console.log(error);

        });
    }
</script>
@endsection