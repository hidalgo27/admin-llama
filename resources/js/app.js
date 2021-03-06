
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('mdbootstrap/js/bootstrap');
require('mdbootstrap/js/mdb');
require('bootstrap-select/js/bootstrap-select');
// require('mdbootstrap/js/addons/datatables.min');
// require('@ckeditor/ckeditor5-build-classic/build/ckeditor');
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/autocomplete';
import 'jquery-ui/ui/widgets/datepicker';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
