
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import router from './routes.js';
import VueRouter from 'vue-router';
import Auth from './auth.js';

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
Vue.use(VueRouter);
Vue.use(Vuetify);

window.Event = new Vue;
window.auth = new Auth();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('vue-layout', require('./components/Layout.vue'));

const app = new Vue({
    el: '#app',
    router
});
