
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const moment = require('moment');

import VueQRCodeComponent from 'vue-qrcode-component';
import Vue2Filters from 'vue2-filters';

Vue.use(Vue2Filters);

Vue.component('qr-code', VueQRCodeComponent);
Vue.component('ethereumtransactionshistory', require('./components/EthereumTransactionsHistory.vue'));
Vue.component('blockcyphertransactionshistory', require('./components/BlockcypherTransactionsHistory.vue'));
Vue.component('cryptoscompare', require('./components/CryptosCompare.vue'));

const app = new Vue({
    el: '#app'
});
