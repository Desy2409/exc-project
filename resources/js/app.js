/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
// window._ = require('lodash');
// wwindow.$ = window.jQuery = require('jquery');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('contact-us', require('./components/ContactMessageNotification.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // component: {
    //     'contact-us': require('./components/ContactMessageNotification.vue')
    // },
    // data: {
    //     // return {
    //     contacts: '',
    //     // }
    // },
    // created() {
    //     if (window.Laravel.userId) {
    //         axios.get('/contact-message-notification').then(response => {
    //             this.contacts = response.data;
    //             console.log(response.data)
    //         });

    //         Echo.private('App.Models.User' + window.Laravel.userId).notification((response) => {
    //             data = { "data": response };
    //             this.contacts.push(data);
    //             console.log(response);
    //         });
    //     }
    // },
});