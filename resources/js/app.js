
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios';
import Swal from 'sweetalert2'
import toastr from 'toastr'

require('./bootstrap');

window.Vue = require('vue');
window.axios = axios;
// window.Swal = sweetalert2;
window.toastr = toastr;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('player-list', require('./components/PlayerList.vue'));
// Vue.component('team-list', require('./components/TeamList.vue'));
//Vue.component('modal', require('./components/Modal.vue'));

Vue.component('sports-app', require('./components/SportsApp.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // TODO: maybe use toastr
 // TODO: use vuex to store state information
 // TODO: use vuex to do multi-component communication
 // TODO: use vuex router for JWT or SESSION AUTH or just do a regular redirect on SESSION AUTH LOGIN (non vue-router)

window.sportsApp = new Vue({
    el: '#application',
    data: {
    }
});
