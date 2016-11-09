import App from './App.vue'
import One from './components/One.vue'
import Two from './components/Two.vue'

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

var VueRouter = require('vue-router');
Vue.use(VueRouter);

var VueResource = require('vue-resource');
Vue.use(VueResource);

Vue.http.options.root = '/api'

const routes = [
    { path: '/', component: One },
    { path: '/two', component: Two }
  ]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes // short for routes: routes
})

const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: { App },
    router
}).$mount('#app')
