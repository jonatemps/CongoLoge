

require('./bootstrap');

// window.Vue = require('vue');

import Echo from "laravel-echo"
var moment = require('moment');

        window.io = require('socket.io-client');

        window.Echo = new Echo({
            broadcaster: 'socket.io',
            host: window.location.hostname + ':6001'
        });



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



// const app = new Vue({
//     el: '#app',
// });
