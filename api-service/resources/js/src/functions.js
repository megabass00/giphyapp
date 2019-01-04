
export function ajaxRequest(options, success, progress, error)
{
    if (options.selector) {
        var $selector = options.selector;
    }else{
        console.log('No se ha recibido ningun selector');
        return;
    }
    if (options.url) {
        var url = options.url;
    }else{
        console.log('No se ha recibido ninguna URL');
        return;
    }
    if (options.methodType) {
        var methodType = options.methodType;
    }else{
        var methodType = 'POST';
    }
    if (options.loaderType) {
        var loaderType = options.loaderType;
    }else{
        var loaderType = 'STATIC';
    }
    if (options.data) {
        var data = options.data;
    }else{
        var data = {};
    }


    var loaderHTML = '';
    var uniqueId = new Date().getUTCMilliseconds();
    if (loaderType == 'PROGRESS') {
        loaderHTML = `
            <div
                id="ajax-loader-`+ uniqueId +`"
                class="ldBar label-center"
                style="width:50%;height:50%;margin:auto"
                data-value="1"
                data-preset="circle"
            ></div>
        `;
    }else{
        loaderHTML = '<div id="ajax-loader-'+ uniqueId +'" class="static-loader"></div>';
    }
    $selector.append(loaderHTML);
    var $loader = $('#ajax-loader-'+ uniqueId);

    $.ajax({
        url: url,
        type: methodType,
        data: data,
        xhr: function()
        {
            var xhr = new window.XMLHttpRequest();
            //Upload progress
            xhr.upload.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percent = evt.loaded / evt.total;
                    console.log('Upload: '+ percent+'%');
                    progress(percent);
                }
            }, false);
            //Download progress
            xhr.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percent = evt.loaded / evt.total;
                    console.log('Download: '+ percent+'%');
                    progress(percent);
                }
            }, false);
            return xhr;
        }
    }).done(function (e) {
        $loader.remove();
        success(e);
    }).fail(function (e) {
        $loader.remove();
        error(e);
    });
}


export function sumCopy(giphyId) {
    console.log('Sumando a '+giphyId);
    $.ajax( {
        url:'/ajax/giphies/sum',
        method:'POST',
        data: {
           id: giphyId
        },
        success: function( bolUpdated ) { 
            if( bolUpdated ) { 
                console.log('Sum ('+giphyId+') OK');
            }   
        }, 
        fail: function() {
            console.log('Sum ('+giphyId+') ERROR');
        }   
    }); 
}


/**
 * TOOLTIPS
 */
export function showTooltip(btn, message) {
    $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
}

export function hideTooltip(btn) {
    setTimeout(function() {
        $(btn).tooltip('hide');
    }, 1000);
}


/**
 * MASONRY
 */
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

export function getMasonryItems(items) {
    var retval = '';
    items.forEach(function(obj, index) {
        retval += getMasonryItem(obj);
    });
    return $( retval );
}

export function getMasonryItem(item) {
    var width = functions.randomInt( 150, 400 );
    var height = functions.randomInt( 150, 250 );
    var item = `
            <div class="masonry-item">
                <div class="masonry-item-content">
                    <img src="`+ item.url +`" />
                </div>
            </div>
    `;
    return item;
}

export function configureMasonryContainer(selector, transitionProp, transitionEndEvent) {
    var masonry = document.querySelector(selector);
    var pckry = $(selector).packery({
        itemSelector: '.masonry-item',
        percentPosition: true
    });

    masonry.addEventListener( 'click', function( event ) {
        // only .masonry-item-content clicks
        if ( !$.find.matchesSelector( event.target.parentElement, '.masonry-item-content' ) ) {
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

        addTransitionListener( itemContent, transitionEndEvent );
        setItemContentTransitionSize( itemContent, itemElem );

        if ( isExpanded ) {
            pckry.packery('shiftLayout');
            // pckry.shiftLayout();
        } else {
            pckry.packery('fit', itemElem);
            // pckry.fit( itemElem );
        }
    });

    var docElem = document.documentElement;
    transitionProp = typeof docElem.style.transition == 'string' ? 'transition' : 'WebkitTransition';
    transitionEndEvent = {
        WebkitTransition: 'webkitTransitionEnd',
        transition: 'transitionend'
    }[ transitionProp ];
}

/*export function setItemContentPixelSize( itemContent ) {
    var previousContentSize = getSize( itemContent );
    // disable transition
    itemContent.style[ transitionProp ] = 'none';
    // set current size in pixels
    itemContent.style.width = previousContentSize.width + 'px';
    itemContent.style.height = previousContentSize.height + 'px';
}*/

export function addTransitionListener(itemContent, transitionEndEvent) {
    // reset 100%/100% sizing after transition end
    var onTransitionEnd = function() {
        itemContent.style.width = '';
        itemContent.style.height = '';
        itemContent.removeEventListener( transitionEndEvent, onTransitionEnd );
    };
    itemContent.addEventListener( transitionEndEvent, onTransitionEnd );
}

export function setItemContentTransitionSize( itemContent, itemElem ) {
    itemContent.style.width = $(itemElem).width() + 'px';
    itemContent.style.height = $(itemElem).height() + 'px';
}


/**
 * HELPERS
 */
export function randomInt( min, max ) {
    return Math.floor( Math.random() * max + min );
}

