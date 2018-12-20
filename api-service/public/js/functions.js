
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
    if (loaderType == 'PROGRESS') {
        loaderHTML = `
            <div
                id="ajax-loader"
                class="ldBar label-center"
                style="width:50%;height:50%;margin:auto"
                data-value="1"
                data-preset="circle"
            ></div>
        `;
    }else{
        loaderHTML = '<div id="ajax-loader" class="static-loader"></div>';
    }
    $selector.append(loaderHTML);
    var $loader = $('#ajax-loader');

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
                    var percentComplete = evt.loaded / evt.total;
                    console.log('Upload: '+ percentComplete+'%');
                    progress(percent);
                }
            }, false);
            //Download progress
            xhr.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log('Download: '+ percentComplete+'%');
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