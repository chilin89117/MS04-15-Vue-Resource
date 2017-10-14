require('./bootstrap');

window.Vue = require('vue');

// import App from './App.vue';

Vue.component('home', require('./components/Home.vue'));

new Vue({
  el: '#app',
});
