require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'

Vue.component('location-picker', require('./components/LocationPicker.vue').default);

const app = new Vue({
  el: '#app',
});

