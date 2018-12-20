
// $(document).ready(function() {
 
// });


function ajaxRequest(options, success, progress, error)
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


function sumCopy(giphyId) {
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
 * HELPERS
 */

function randomInt( min, max ) {
    return Math.floor( Math.random() * max + min );
}