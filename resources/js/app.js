require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueAgile from 'vue-agile'

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('location-picker', require('./components/LocationPicker.vue').default);
Vue.component('city-flicker', require('./components/CityFlicker.vue').default);
Vue.component('venues-details-list', require('./components/VenuesDetailsList.vue').default);
Vue.component('weather-details-list', require('./components/WeatherDetailsList.vue').default);

Vue.use(VueAgile)

const app = new Vue({
  el: '#app',
});

