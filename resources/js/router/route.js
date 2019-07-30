import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '../components/login/Login';
import Register from '../components/login/Register';

const routes = [
    { path: '/login', component: Login },
    { path: '/register', component: Register },

];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;