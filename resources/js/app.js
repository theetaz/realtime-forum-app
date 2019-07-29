/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import Vuetify from 'vuetify';

import AppHome from './components/AppHome.vue';
import router from './router/route';

import User from './helpers/User';

window.User = User;

Vue.use(Vuetify);
Vue.component('AppHome', require('./components/AppHome.vue'));


const app = new Vue({
    el: '#app',
    router,
    components: {
        AppHome: AppHome,
    },
    vuetify: new Vuetify(),
})