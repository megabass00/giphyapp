
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {
    console.log(e);
}


/**
 * Load JS Libraries
 */
// jQuery bridge
var jQueryBridget = require('jquery-bridget');


// jQuery UI
import 'jquery-ui/ui/widgets/autocomplete.js';


// Loading Bar
require('./src/loading-bar.js');


// Vue Slick - Carousel
import Slick from 'vue-slick';


// Masonry
var Masonry = require('masonry-layout');
jQueryBridget( 'masonry', Masonry, window.$ ); // make Masonry a jQuery plugin

// Masonry dependences (imagesloaded)
var imagesLoaded = require('imagesloaded');
imagesLoaded.makeJQueryPlugin( window.$ ); // provide jQuery argument

// Masonry dependences (packery)
var Packery = require('packery');
jQueryBridget( 'packery', Packery, window.$ ); // make Masonry a jQuery plugin


// Star Rating
require('bootstrap-star-rating');


// Custom functions
window.functions = require('./src/functions.js');


// Clipboard
var ClipboardJS = require('clipboard');


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


/**
 * Add token to ajax requests
 */
$.ajaxSetup({ // add csrf-token to all ajax headers
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });


/**
 * Initialization
 */
$(document).ready(function() 
{
    // Init Clipboard
    var clipboard = new ClipboardJS('.btn-clipboard');
    clipboard.on('success', function(e) {
        // console.info('Action:', e.action);
        // console.info('Text:', e.text);
        // console.info('Trigger:', e.trigger);
        var title = $(e.trigger).data('title');
        window.functions.showTooltip(e.trigger, title +' copied!');
        window.functions.hideTooltip(e.trigger);

        var giphyId = $(e.trigger).data('id');
        window.functions.sumCopy(giphyId);
        e.clearSelection();
    });
    clipboard.on('error', function(e) {
        // console.error('Action:', e.action);
        // console.error('Trigger:', e.trigger);
        window.functions.showTooltip(e.trigger, fallbackMessage(e.action));
        window.functions.hideTooltip(e.trigger);
    });

    // Init select2
    // $('.select2').select2({
    //     placeholder: 'Select a value...'
    // });
});