require('./bootstrap');

window.Vue = require('vue');

//---------------------------------------------------------------------

// From http://api.jquery.com/jquery.ajax/
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  },
});

//---------------------------------------------------------------------

// From https://github.com/pagekit/vue-resource/blob/develop/docs/config.md
var VueResource = require('vue-resource');
Vue.use(VueResource);

// From https://github.com/pagekit/vue-resource/blob/develop/docs/http.md
Vue.http.interceptors.push((request, next) => {
  // request.method = 'POST';
  request.headers.set('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
  next();
});

//---------------------------------------------------------------------

// From https://github.com/axios/axios
axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

//---------------------------------------------------------------------

import Home from './components/Home.vue';

new Vue({
  el: '#app',
  components: {
    appHome: Home,
  },
  data: {
    bcrypt: require('bcryptjs'),
  },
});
