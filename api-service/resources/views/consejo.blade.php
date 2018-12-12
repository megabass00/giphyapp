<!DOCTYPE html>
<html>
<head>
	<title>
        GiphyAPP · Consejo Jedi
    </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/consejo.js"></script>
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
        text-align: center;
        text-shadow: 0px -4px 4px rgba(0, 0, 0, 0.7);
    }



    @media (min-width: 768px) {

    /* show 3 items */
    .carousel-inner .active,
    .carousel-inner .active + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
        display: block;
    }

    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }

    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
    position: relative;
    transform: translate3d(0, 0, 0);
    }

    .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }

    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }

    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }

    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

    }

    /* Bootstrap Lightbox using Modal */

    #profile-grid { overflow: auto; white-space: normal; } 
    #profile-grid .profile { padding-bottom: 40px; }
    #profile-grid .panel { padding: 0 }
    #profile-grid .panel-body { padding: 15px }
    #profile-grid .profile-name { font-weight: bold; }
    #profile-grid .thumbnail {margin-bottom:6px;}
    #profile-grid .panel-thumbnail { overflow: hidden; }
    #profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
</style>


<div class="container">
    <div class="row">
        <div class="btn-login">
            <a href="{{ url('/login') }}">
                Login
            </a>
        </div>
    </div>

    <div class="row consejo-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quasi amet accusamus debitis voluptatum fugit facilis similique, reiciendis velit quos illum, perspiciatis quam iure veniam sunt iusto architecto veritatis temporibus ex distinctio
            <br> voluptatem perferendis, hic voluptas a! Neque voluptates sunt error commodi vitae ea. Obcaecati perspiciatis, ratione optio, repellat fugit iure alias illum voluptatum omnis molestiae deserunt cupiditate at quia deleniti nobis ipsum sit fugiat beatae assumenda totam?
    </div>
    
    <div class="row">
        <div class="container-fluid">
            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">

                    @foreach ($giphies as $giphy)
                        <div class="carousel-item col-md-3 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                <a href="#" title="{{ $giphy->title }}" class="thumb" target="_blank">
                                    <img class="img-fluid mx-auto d-block" src="{{ $giphy->url }}" alt="slide 2">
                                </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="carousel-item col-md-3  active">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                            <a href="#" title="image 1" class="thumb">
                                <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=1" alt="slide 1">
                            </a>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


</body>
</html>