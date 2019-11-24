window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('./ckEditor');
window.core = require("./core");
require('jquery-ui/ui/widgets/sortable.js')
require('popper.js');
require('bootstrap');
require('bootstrap-select');
require('bootstrap-notify');
require('jasny-bootstrap/dist/js/jasny-bootstrap');
window.accounting = require('accounting/accounting');
require('./simpleMoneyFormat');
window.flatpickr = require("flatpickr");
window.Swal = require('sweetalert2');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.csrfToken = $('meta[name="csrf-token"]').attr("content");

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": window.csrfToken
    }
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
