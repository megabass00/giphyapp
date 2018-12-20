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
    .top-viewed-container {
        height: 20vh;
        /* border: 3px white solid; */
    }
    .slick-slide img {
        max-height: 19vh;
        padding: 0 0.2vw;
        border-radius: 10px;
        cursor: pointer;
    }


    #masonry-list-container {
        background: rgba(0, 0, 0, .3);
        max-width: 1000px;
    }
    .item-masonry {
        width: 200px;
        float: left;
    }
    .item-masonry img {
        display: block;
        width: 100%;
    }
</style>


<div class="container">
    <div class="row">
        <div class="btn-login">
            <a href="{{ url('/login') }}">
                Login
            </a>
        </div>
    </div>

    <div class="row consejo-description text-border">
        Bienvenido al portal del consejo, el mejor desde luego de lejos. Aquí veras buenas almejas mientras el personal te aconseja. El mundo no es lo que era, a todo el mundo le falta más de una primavera. Mira a tu alrededor, todo destrucción, apestoso hedor. Vaya desesperación. La fauna que aquí aúna nos trae un rinoceronte lanudo, un cornudo que le lame el culo, y un barbudo de cuya inteligencia no dudo. Tienes un tio protestón, un tobillo como pilares del pateón y un equilibrista jefe de pista con un gran orejón. También hay cerditas, un yeti que huele braguitas y un moai. Esto es lo que hay.
    </div>
    
    <div class="row top-viewed">
        <h1 class="text-border">
            Top Viewed
        </h1>
        <small class="text-border">
            Here you can see the most viewed giphies. If you click into some giphy it copies url to the clipboard.
        </small>
        <div class="container-fluid">
            <div class="top-viewed-container">

                @foreach ($giphies as $giphy)
                    <div class="giphy-thumb btn-clipboard" data-clipboard-text="{{ $giphy->url }}" data-title="{{ $giphy->title }}" data-id="{{ $giphy->id }}">
                        <img class="img-fluid mx-auto d-block" src="{{ $giphy->url }}" alt="Top Viewed">
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="row masonry-list">
        <div class="col-6">
            <div id="masonry-list-container">
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/loading.io/loading-bar.js') }}"></script>
<script src="{{ asset('plugins/vue-slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/masonry/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/masonry/imagesloaded.pkgd.min.js') }}"></script>
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
    $(document).ready(function() {
        $('.top-viewed-container').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 1000,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var $container = $('#masonry-list-container').masonry({
            itemSelector: '.item-masonry',
            columnWidth: 200
        });


        var options = {
            'selector': $container,
            'url': '/ajax/giphies/masonryList',
            'data': {}
        };
        ajaxRequest(options, function(data){
            if (data.success) { 
                var $items = getItems(data.giphies);
                $container.masonryImagesReveal( $items );
            }
        }, function(percent) {
            console.log(percent+'%');

        }, function(error) {
            console.log(error);

        });
        
        
        //TODO: crear precarga
        // $.ajax( {
        //     url:'/ajax/giphies/masonryList',
        //     method:'POST',
        //     success: function(data) { 
        //         if (data.success) { 
        //             var $items = getItems(data.giphies);
        //             // console.log($items);
        //             $container.masonryImagesReveal( $items );
        //         }   
        //     }, 
        //     fail: function() {
        //         console.log('ERROR');
        //     }   
        // }); 
    });

    $.fn.masonryImagesReveal = function( $items ) {
        var msnry = this.data('masonry');
        var itemSelector = msnry.options.itemSelector;
        
        $items.hide();
        
        this.append( $items );
        $items.imagesLoaded().progress( function( imgLoad, image ) {
            // get item
            // image is imagesLoaded class, not <img>, <img> is image.img
            var $item = $( image.img ).parents( itemSelector );
            // un-hide item
            $item.show();
            // masonry does its thing
            msnry.appended( $item );
        });
        
        return this;
    };

    function randomInt( min, max ) {
        return Math.floor( Math.random() * max + min );
    }

    function getItems(items) {
        var retval = '';
        items.forEach(function(obj, index) {
            retval += getItem(obj);
        });
        // console.log(retval);
        return $( retval );
    }

    function getItem(item) {
        var width = randomInt( 150, 400 );
        var height = randomInt( 150, 250 );
        var item = `<div class="item-masonry">
                        <img src="`+ item.url +`" />
                    </div>`;
        return item;
    }
</script>

</body>
</html>