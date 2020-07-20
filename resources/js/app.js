
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
import VueRouter from 'vue-router';
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';

import Gate from './AcessGates';

Vue.prototype.$gate = new Gate(window.user);

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// Pagination

Vue.component('pagination', require('laravel-vue-pagination'));
// Binding sweetalert to the global window object
window.swal = swal;
const toast  = swal.mixin({
    toast: true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000
});
window.toast = toast;

// using imported vue-router
Vue.use(VueRouter);


// binding data and using vueprogressbar
const options = {
    color:'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options);

window.Fire = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('not-found', require('./components/NotFound.vue').default);
 let routes = [
     {path:'/courses', component: require('./components/Courses.vue').default},
     {path:'/users', component: require('./components/Users.vue').default},
     {path:'/profile', component: require('./components/Profile.vue').default},
     {path:'/dashboard', component: require('./components/Dashboard.vue').default},
     {path:'/courserec', component: require('./components/PickSession.vue').default},
     {path:'*', component: require('./components/NotFound.vue').default}
 ];
 const router = new VueRouter({
     routes,
     'mode': 'history'
 });

 Vue.filter('upText', (text) => text.charAt(0).toUpperCase() + text.slice(1));
 Vue.filter('humanDate', (date) => moment(date).fromNow());
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


// Laravel Passport components
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
}).$mount('#app');
