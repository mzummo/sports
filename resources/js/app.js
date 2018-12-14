
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios';

require('./bootstrap');

window.Vue = require('vue');
window.axios = axios;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('player-list', require('./components/PlayerList.vue'));
Vue.component('team-list', require('./components/TeamList.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        teams: [
            { id: 0, name: "team 1" },
            { id: 1, name: "team 2" }
        ],
        players: [
            { id: 0, firstName: 'Player 1', lastName: 'L 1' },
            { id: 1, firstName: 'Player 2', lastName: 'L 2' }
        ],
        items: [
            { message: 'Foo' },
            { message: 'Bar' }
        ]
    },
    methods: {
        addTeam: function() {
            console.log('team')
        },
        addPlayer: function() {
            console.log('player')
        },
        
    }
});
