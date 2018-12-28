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
    <link rel="stylesheet" href="{{ asset('plugins/loading.io/loading-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/vue-slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/vue-slick/slick-theme.css') }}">
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


    .masonry-list {
        text-align: center;
    }
    #masonry-list-container {
        background: rgba(0, 0, 0, .3);
        max-width: 100vw;
        border-radius: 7px;
        /* width: 50vw; */
    }



    /* item is invisible, but used for layout */
    .masonry-item,
    .masonry-sizer {
        width: 5%;
        /* width: 20vw; */
    }

    .masonry-item {
        float: left;
        /* width: 200px; */
        height: auto;
    }
    .masonry-item img {
        display: block;
        width: 100%;
    }
    .masonry-item-content {
        width: 100%;
        height: auto;
    }

    /* masonry-item-content is visible, and transitions size */
    .masonry-item-content {
        /* width: 100%;
        height: 100%; */
        border: 2px solid hsla(0, 0%, 0%, 0.9);
        -webkit-transition: width 0.4s, height 0.4s;
                transition: width 0.4s, height 0.4s;
    }

    .masonry-item:hover .masonry-item-content {
        /* background: #C90; */
        cursor: pointer;
    }

    /* both item and item content change size */
    .masonry-item.is-expanded {
        width: 9%;
        height: auto;
        z-index: 2;
    }

    .masonry-item.is-expanded .masonry-item-content {
        background: white;
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
</style>


<div class="container-fluid">
    <div class="row">
        <div class="btn-login">
            <a href="{{ url('/login') }}">
                Login
            </a>
        </div>
    </div>

    {{-- <div class="row consejo-description text-border">
        Bienvenido al portal del consejo, el mejor desde luego de lejos. Aquí veras buenas almejas mientras el personal te aconseja. El mundo no es lo que era, a todo el mundo le falta más de una primavera. Mira a tu alrededor, todo destrucción, apestoso hedor. Vaya desesperación. La fauna que aquí aúna nos trae un rinoceronte lanudo, un cornudo que le lame el culo, y un barbudo de cuya inteligencia no dudo. Tienes un tio protestón, un tobillo como pilares del pateón y un equilibrista jefe de pista con un gran orejón. También hay cerditas, un yeti que huele braguitas y un moai. Esto es lo que hay.
    </div> --}}

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
</div>


<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/loading.io/loading-bar.js') }}"></script>
<script src="{{ asset('plugins/vue-slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/masonry/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/masonry/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/masonry/packery.pkgd.min.js') }}"></script>
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
        initAutocompleteField();

        loadTopViewed();

        var transitionProp;
        var transitionEndEvent;
        loadMasonry();
        
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

    function loadMasonry() {
        var $container = $('#masonry-list-container');
        var columnWidth = $container.width() / 10;
        console.log();
        var $container = $container.masonry({
            itemSelector: '.masonry-item',
            columnWidth: 60
        });


        var options = {
            'selector': $container,
            'url': '/ajax/giphies/masonryList',
            'data': {}
        };
        ajaxRequest(options, function(data){
            if (data.success) { 
                var $items = getMasonryItems(data.giphies);
                $container.masonryImagesReveal( $items );
                configureMasonryContainer();
            }
        }, function(percent) {
            console.log(percent+'%');

        }, function(error) {
            console.log(error);

        });
    }

    $.fn.masonryImagesReveal = function( $items ) {
        var msnry = this.data('masonry');
        var itemSelector = msnry.options.itemSelector;
        
        $items.hide();
        
        this.append( $items );
        $items.imagesLoaded().progress( function( imgLoad, image ) {
            var $item = $( image.img ).parents( itemSelector );
            $item.show();
            msnry.appended( $item );
        });
        
        return this;
    };

    function getMasonryItems(items) {
        var retval = '';
        items.forEach(function(obj, index) {
            retval += getMasonryItem(obj);
        });
        return $( retval );
    }

    function getMasonryItem(item) {
        var width = randomInt( 150, 400 );
        var height = randomInt( 150, 250 );
        // var item = `<div class="masonry-item" width="`+ width +`" height="`+ height +`">
        //                 <img src="`+ item.url +`" />
        //             </div>`;
        var item = `
                <div class="masonry-item">
                    <div class="masonry-item-content">
                        <img src="`+ item.url +`" />
                    </div>
                </div>
        `;
        // console.log(item);
        return item;
    }

    function configureMasonryContainer() {
        var masonry = document.querySelector('.masonry-list-container');
        var pckry = new Packery( masonry, {
            itemSelector: '.masonry-item',
            percentPosition: true
        });

        masonry.addEventListener( 'click', function( event ) {
            // only .masonry-item-content clicks
            if ( !matchesSelector( event.target.parentElement, '.masonry-item-content' ) ) {
                return;
            }

            var itemContent = event.target.parentElement;
            // setItemContentPixelSize( itemContent );

            var itemElem = itemContent.parentNode;

            var isExpanded = itemElem.classList.contains('is-expanded');
            itemElem.classList.toggle('is-expanded');

            // force redraw
            var redraw = itemContent.offsetWidth;
            // renable default transition
            itemContent.style[ transitionProp ] = '';

            addTransitionListener( itemContent );
            setItemContentTransitionSize( itemContent, itemElem );

            if ( isExpanded ) {
                // if shrinking, shiftLayout
                pckry.shiftLayout();
            } else {
                // if expanding, fit it
                pckry.fit( itemElem );
            }
        });

        var docElem = document.documentElement;
        transitionProp = typeof docElem.style.transition == 'string' ? 'transition' : 'WebkitTransition';
        transitionEndEvent = {
            WebkitTransition: 'webkitTransitionEnd',
            transition: 'transitionend'
        }[ transitionProp ];
    }

    function setItemContentPixelSize( itemContent ) {
        var previousContentSize = getSize( itemContent );
        // disable transition
        itemContent.style[ transitionProp ] = 'none';
        // set current size in pixels
        itemContent.style.width = previousContentSize.width + 'px';
        itemContent.style.height = previousContentSize.height + 'px';
    }

    function addTransitionListener( itemContent ) {
        // reset 100%/100% sizing after transition end
        var onTransitionEnd = function() {
            itemContent.style.width = '';
            itemContent.style.height = '';
            itemContent.removeEventListener( transitionEndEvent, onTransitionEnd );
        };
        itemContent.addEventListener( transitionEndEvent, onTransitionEnd );
    }

    function setItemContentTransitionSize( itemContent, itemElem ) {
        // set new size
        var size = getSize( itemElem );
        itemContent.style.width = size.width + 'px';
        itemContent.style.height = size.height + 'px';
    }
</script>

</body>
</html>